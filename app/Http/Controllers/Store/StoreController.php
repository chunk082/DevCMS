<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use App\Models\UsersTransaction;
use App\Models\UsersCurrency;

class StoreController extends Controller
{
    public function purchase(Request $request)
    {
        $user = Auth::user();
        $product = $request->input('product');

        // All purchasable items
        $storeItems = [
            'bronze_vip' => ['type' => 'vip', 'rank' => 2, 'price' => 5],
            'silver_vip' => ['type' => 'vip', 'rank' => 3, 'price' => 7],
            'gold_vip'   => ['type' => 'vip', 'rank' => 4, 'price' => 12],

            'diamonds_220'  => ['type' => 'currency', 'amount' => 220, 'price' => 4],
            'diamonds_700'  => ['type' => 'currency', 'amount' => 700, 'price' => 11],
            'diamonds_1200' => ['type' => 'currency', 'amount' => 1200, 'price' => 14],
        ];

        // Validate input
        if (!isset($storeItems[$product])) {
            return back()->with('error', 'Invalid product selected.');
        }

        $item = $storeItems[$product];

        // Check wallet balance
        if ($user->wallet->balance < $item['price']) {
            return back()->with('error', 'Insufficient balance.');
        }

        // Deduct from wallet
        $user->wallet->balance -= $item['price'];
        $user->wallet->save();

        // Log transaction
        UsersTransaction::create([
            'user_id'        => $user->id,
            'amount'         => $item['price'],
            'desc'           => ucwords(str_replace('_', ' ', $product)),
            'transaction_id' => strtoupper(Str::uuid()),
        ]);

        // Apply the purchase
        if ($item['type'] === 'vip') {
            $user->rank = $item['rank'];
            $user->save();
        } elseif ($item['type'] === 'currency') {
            // Type 5 = Diamonds
            $currency = UsersCurrency::where('user_id', $user->id)->where('type', 5)->first();

            if ($currency) {
                $currency->amount += $item['amount'];
                $currency->save();
            } else {
                UsersCurrency::create([
                    'user_id' => $user->id,
                    'type'    => 5,
                    'amount'  => $item['amount'],
                ]);
            }
        }

        $productName = ucwords(str_replace('_', ' ', $product));
        $productName = str_replace('Vip', 'VIP', $productName);

        return back()->with('success', $productName . ' purchased successfully!');
    }

    public function giftVIP(Request $request)
{
    $request->validate([
        'recipient' => 'required|string|exists:users,username',
        'product'   => 'required|in:bronze_vip,silver_vip,gold_vip',
    ]);

    $sender = Auth::user();
    $recipient = \App\Models\User::where('username', $request->recipient)->first();

    // Prevent gifting to yourself
    if ($sender->id === $recipient->id) {
        return response()->json(['error' => 'You cannot gift VIP to yourself.'], 400);
    }   

    // Prevent gifting to staff (rank 5+)
    if ($recipient->rank >= 5) {
        return response()->json(['error' => 'This user\'s VIP rank is higher or equal to the rank you\'re trying to gift them.'], 400);
    }

    $vipOptions = [
        'bronze_vip' => ['rank' => 2, 'price' => 5],
        'silver_vip' => ['rank' => 3, 'price' => 7],
        'gold_vip'   => ['rank' => 4, 'price' => 12],
    ];

    $vip = $vipOptions[$request->product];

    if ($sender->wallet->balance < $vip['price']) {
        return response()->json(['error' => 'Insufficient balance.'], 400);
    }

    // Deduct sender balance
    $sender->wallet->balance -= $vip['price'];
    $sender->wallet->save();

    // Apply to recipient
    $recipient->rank = $vip['rank'];
    $recipient->save();

    // Log transaction
    \App\Models\UsersTransaction::create([
        'user_id' => $sender->id,
        'amount' => $vip['price'],
        'desc' => 'Gifted ' . strtoupper($request->product) . ' to ' . $recipient->username,
        'transaction_id' => strtoupper(Str::uuid()),
    ]);

    return response()->json([
        'success' => 'Gift sent to ' . $recipient->username . '!',
        'username' => $recipient->username,
        'productName' => strtoupper(str_replace('_vip', '', $request->product)) . ' VIP',
        'price' => $vip['price'],
    ]);
}

}
