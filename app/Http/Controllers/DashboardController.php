<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\User;
use App\Models\Wallet;
use App\Models\Deposit;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\SupportTicket;
use App\Models\WithdrawalRequest;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index() {

        $allDeposits = Deposit::all();
        $userTrans = auth()->user()->transactions;
        $activeInvestments = Deposit::where('status', true)->get();
        $userDeposits = auth()->user()->deposits;
        $transactions = Transaction::all();
        $users = User::all();

        // find the user wallet...
        $userWallet = auth()->user()->wallet;
        $deposit = $this->currencyFormatter($userWallet->deposit);
        $investment = $this->currencyFormatter($userWallet->investment);
        $earning = $this->currencyFormatter($userWallet->earning);
        $withdrawable = $this->currencyFormatter($userWallet->withdrawable);

        // Get the user withdrawal request...
        $withdrawalRequests = WithdrawalRequest::orderBy('id', 'desc')->get();

        // dd($withdrawalRequests);

        // user withdrawal request...

        // send details to the dashboard page
        return view('user.dashboard', compact('userDeposits', 'allDeposits', 'transactions', 'userTrans', 'activeInvestments', 'users', 'deposit', 'investment', 'earning', 'withdrawable', 'withdrawalRequests'));
    }

    public function investmentPlans() {
        $userTrans = Transaction::where('id', auth()->user()->id)->get();
        return view('user.investment-plans', compact('userTrans'));
    }

    public function security() {
        return view('user.security');
    }

    public function settings() {
        $userDetails = auth()->user()->userdetails;
        return view('user.settings', compact('userDetails'));
    }

    public function logout() {
        Auth::logout();

        // redirect to the home page..
        return redirect()->route('login');
    }

    /**
     * Support ticket section... 
     */
    public function supportTicket() {
        return view('user.support-ticket');
    }

    /**
     * Logged in user profile secction...
     * 
     */
    public function profile() {
        return view('user.profile');
    }






    // money formatter function...
    public function currencyFormatter($money) {

        if ($money > 0.00 && $money < 1000) {
            $money = number_format($money, 2, '.', ',');
        }
        if ($money > 0.00 && $money >= 1000 && $money <= 999999) {
            $money = number_format($money / 1000, 2, '.', ',') . 'K';
        }
        if ($money >= 1000000) {
            $money = number_format($money / 1000000, 2, '.', ',') . 'M';
        }

        return $money;
    }
}
