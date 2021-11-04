<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\History;
use Illuminate\Http\Request;
use App\Models\WithdrawalRequest;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\DashboardController;

class WithdrawalRequestController extends Controller
{
   public function index()
   {

        $dashboard = new DashboardController;
        $wallet = auth()->user()->wallet;
        $deposit = $dashboard->currencyFormatter($wallet->deposit);
        $investment = $dashboard->currencyFormatter($wallet->investment);
        $earning = $dashboard->currencyFormatter($wallet->earning);
        $withdrawable = $dashboard->currencyFormatter($wallet->withdrawable);

        return view('user.withdraw', compact('deposit', 'investment', 'earning', 'withdrawable'));
   }

   public function withdrawalHistory() {
       $allRequests = WithdrawalRequest::all();
       $dashboard = new DashboardController;
       $wallet = auth()->user()->wallet;
       $deposit = $dashboard->currencyFormatter($wallet->deposit);
       $investment = $dashboard->currencyFormatter($wallet->investment);
       $earning = $dashboard->currencyFormatter($wallet->earning);
       $withdrawable = $dashboard->currencyFormatter($wallet->withdrawable);

       return view('user.withdraw-history', compact('deposit', 'investment', 'earning', 'withdrawable', 'allRequests'));
   }

   /**
    * Store new withdrawal...
    */
    public function store(Request $request) {

        // Get the data and validate...
        $this->validate($request, [
            'amount' => 'required|numeric|',
        ]);

        // Query the user wallet to make sure they have that amount
        $userwallet = auth()->user()->wallet;
        $userWithdrawable = $userwallet->withdrawable;

        // Check if the user can withdraw that amount...
        if ($userWithdrawable < $request->amount) {
            // Send a flash message...
            Session::flash('error', ' OOPS!!! Your withdrawal request must not be greater than your account withdrawable balance');
        } else if ($userWithdrawable == 0.00) {
            // Send a flash message...
            Session::flash('error', ' OOPS!!! You can not request withdrawal. Your account is 0.00. Fund and try again.');
        } else {
            $now = Carbon::now();
            // create the request now...
            $newRequest = auth()->user()->withdrawalrequests()->create([
                'amount' => $request->amount,
                'status' => 'Pending',
                'date' => $now,
            ]);

            if (!$newRequest) {
                // Send a flash message...
                Session::flash('error', ' OOPS!!! There was an error submitting request. Please try again.');
            } else {
                // Send a flash message...
                Session::flash('success', ' Your withdrawal request was submitted successfully. You will receive notification upon approval.');
            }
        }

        return redirect()->back();

    }

    public function approve($id) {
        // find the withdrawal with that id...
        $withdrawal = WithdrawalRequest::find($id);

        // dd($withdrawal);

        // get the amount...
        $amount = $withdrawal->amount;

        // get the user is...
        $user = User::find($withdrawal->user_id);

        // check the user wallet before approving the withdrawal...
        $userWalletAmount = $user->wallet->withdrawable;

        // new wallet amount...
        $newAmount = $userWalletAmount - $amount;

        // check if the user wallet has such amount to withdraw...
        if ($amount > $userWalletAmount) {
            // send a session error message to the front page...
            Session::flash("error", "OOP!!! The user wallet doesn't have such amount to withdraw. Please check and try again.");
        }

        // if the user has that amount on their wallet...
        else {
            // update the wallet status to approved and true...
            $withdrawalUpdate = $withdrawal->update([
                'status' => 'APPROVED',
                'approved' => true,
            ]);

            // update the user withdrwable wallet amount...only when the withdrawalUpodate returns true...
            if (!$withdrawalUpdate) {
                // send an error message back to the front page...
                Session::flash('error', 'OOPP!!! There was an error updating the withdrawal record');
            }
            // Update the user wallet table if it is successful...
            else {
                $user->wallet->update([
                    'withdrawable' => $newAmount,
                ]);

                // Send an email here...

                // Send a success message to the admin...
                Session::flash('success', ' Withdrawal request and user wallet updated successfully.');
            }

        }

        // redirect back to the same page...
        return redirect()->back();


    }

}
