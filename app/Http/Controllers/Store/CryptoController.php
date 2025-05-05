<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use App\Models\CryptoPayment;
use App\Models\UsersWallet;

class CryptoController extends Controller
{

public function store(Request $request)
{
    $validated = $request->validate([
        'amount' => 'required|numeric|min:1',
        'payment_gateway' => 'required|string|max:20',
    ]);

    // Create direct payment
    $response = Http::withHeaders([
        'x-api-key' => env('NOWPAYMENTS_API_KEY'),
    ])->post('https://api.nowpayments.io/v1/payment', [
        'price_amount' => $validated['amount'],
        'price_currency' => 'usd',
        'pay_currency' => strtolower($validated['payment_gateway']),
        'order_id' => Str::uuid(),
        'order_description' => 'DevCMS Credit Purchase',
        'ipn_callback_url' => route('crypto.ipn'),
    ]);

    if (!$response->successful()) {
        \Log::error('NOWPayments payment creation failed', ['status' => $response->status(), 'body' => $response->body()]);
        return back()->with('error', 'Failed to create payment.');
    }

    $paymentData = $response->json();

    // Save payment
    $payment = CryptoPayment::create([
        'user_id' => auth()->id(),
        'payment_gateway' => strtoupper($validated['payment_gateway']),
        'amount' => $validated['amount'],
        'amount_crypto' => $paymentData['pay_amount'] ?? 0,
        'address' => $paymentData['pay_address'] ?? '',
        'now_payment_id' => $paymentData['payment_id'],
        'now_invoice_id' => null, // not used anymore
        'status' => 'pending',
        'expires_at' => now()->addMinutes(60),
    ]);

    return redirect()->route('payment.show', $payment->id);
}

public function show($id)
{
    $payment = CryptoPayment::findOrFail($id);

    return view('payment', compact('payment')); // ← no store.

}

public function ipn(Request $request)
{
    $data = $request->all();

    \Log::info('NOWPayments IPN received:', $data);

    if (isset($data['payment_id'])) {
        $payment = CryptoPayment::where('now_payment_id', $data['payment_id'])->first();

        if ($payment) {
            $payment->update([
                'address' => $data['pay_address'] ?? $payment->address,
                'amount_crypto' => $data['pay_amount'] ?? $payment->amount_crypto,
                'status' => $data['payment_status'] ?? $payment->status,
            ]);

            return response('IPN processed', 200);
        }
    }

    return response('Payment not found', 404);
}


public function expireOldPayments()
{
    $expiredPayments = CryptoPayment::where('status', 'pending')
        ->where('expires_at', '<=', now());

    $count = $expiredPayments->count(); // Count BEFORE updating

    $expiredPayments->update([
        'status' => 'expired'
    ]);

    Log::info('Expired ' . $count . ' crypto payments.');

    return response()->json([
        'message' => 'Expired ' . $count . ' payments.',
    ]);
}


public function wallet()
{
    $user = auth()->user();

    // Find or create the wallet
    $wallet = UsersWallet::firstOrCreate(
        ['user_id' => $user->id],
        ['balance' => 0]
    );

    // Check if any *PAID* crypto payments exist for this user
    $pendingCredits = CryptoPayment::where('user_id', $user->id)
        ->where('status', 'paid')
        ->get();

    foreach ($pendingCredits as $payment) {
        // Add the amount to the wallet
        $wallet->balance += $payment->amount;
        $wallet->save();

        // Mark the payment as "complete" so it's not added again
        $payment->update([
            'status' => 'complete'
        ]);
    }

    return view('store', [
        'wallet' => $wallet
    ]);
}


}