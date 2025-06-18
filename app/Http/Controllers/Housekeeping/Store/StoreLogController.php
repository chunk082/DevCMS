<?php

namespace App\Http\Controllers\Housekeeping\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UsersWallet;
use App\Models\UsersTransaction;
use App\Models\CryptoPayment;
use App\Models\User;

class StoreLogController extends Controller
{
    /**
     * Show store transactions.
     *
     * Route: /housekeeping/store/transactions
     */
    public function index()
    {
        $transactions = UsersTransaction::with('user')
            ->latest()
            ->paginate(25);

        return view('housekeeping.store.transactions', compact('transactions'));
    }

    /**
     * Show user wallet balances.
     *
     * Route: /housekeeping/store/wallet
     */
    public function wallet()
    {
        $wallets = UsersWallet::with('user')
            ->orderByDesc('balance')
            ->paginate(25);

        return view('housekeeping.store.wallet', compact('wallets'));
    }

    public function crypto()
    {   
        $cryptoPayments = CryptoPayment::with('user')
            ->latest()
            ->paginate(25);

        return view('housekeeping.store.crypto', compact('cryptoPayments'));
    }

}
