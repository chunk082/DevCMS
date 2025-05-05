<?php

namespace App\Http\Controllers\Housekeeping\Admin;

use App\Http\Controllers\Controller;
use App\Models\Housekeeping\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VoucherController extends Controller
{
    public function index()
    {
        $vouchers = Voucher::all();
        logHousekeepingActivity("User: " . Auth::user()->username . " has view the Voucher Page");
        return view('housekeeping.admin.voucher', compact('vouchers'));
    }

    public function create()
    {
        return view('housekeeping.admin.voucher.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:vouchers|max:255',
            'credits' => 'nullable|integer',
            'points' => 'nullable|integer',
            'points_type' => 'nullable|string|max:255',
            'catalog_item_id' => 'nullable|integer',
            'amount' => 'nullable|integer',
            'limit' => 'nullable|integer',
        ]);

        Voucher::create($request->all());

        logHousekeepingActivity("User: " . Auth::user()->username . " has created a Voucher");

        return redirect()->route('housekeeping.admin.voucher')->with('success', 'Voucher created successfully.');
    }

    public function edit(Voucher $voucher)
    {
        return view('housekeeping.admin.voucher.edit', compact('voucher'));
    }

    public function update(Request $request, Voucher $voucher)
    {
        $request->validate([
            'code' => 'required|max:255|unique:vouchers,code,' . $voucher->id,
            'credits' => 'nullable|integer',
            'points' => 'nullable|integer',
            'points_type' => 'nullable|string|max:255',
            'catalog_item_id' => 'nullable|integer',
            'amount' => 'nullable|integer',
            'limit' => 'nullable|integer',
        ]);

        $voucher->update($request->all());

        logHousekeepingActivity("User: " . Auth::user()->username . " has edited a Voucher");

        return redirect()->route('housekeeping.admin.voucher')->with('success', 'Voucher updated successfully.');
    }

    public function destroy(Voucher $voucher)
    {
        $voucher->delete();

        logHousekeepingActivity("User: " . Auth::user()->username . " has deleted a Voucher");

        return redirect()->route('housekeeping.admin.voucher')->with('success', 'Voucher deleted successfully.');
    }
}
