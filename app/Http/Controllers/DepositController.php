<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Plan;
use App\Models\Wallet;
use App\Models\Deposit;
use App\Models\History;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\TransactionController;

class DepositController extends Controller
{


    public function index() {
        return view('user.make-deposit');
    }

    public function newDeposit(Request $request) {

        // Validate the data...
        $this->validate($request, [
            'investment_plan' => 'required|string|max:255',
            'investment_amount' => 'required|numeric',
        ]);

        // Find the plan that the user selected
        $plan = Plan::where('id', $request->investment_plan)->first();

        // Do some calculations to get the expected amount...
        $expected_amount = ($plan->percentage * $request->investment_amount) / 100;

        // Create a new deposit...
        $deposit = new Deposit();

        $deposit->plan_id = $plan->id;
        $deposit->user_id = auth()->id();
        $deposit->plan_name = $plan->name;
        $deposit->username = auth()->user()->username;
        $deposit->investment_amount = $request->investment_amount;
        $deposit->plan_interval = $plan->interval;
        $deposit->plan_percent = $plan->percentage;
        $deposit->expected_amount = $expected_amount;
        $deposit->plan_duration = $plan->duration;
        $deposit->status = false;

        // save the deposit...
        $deposit->save();

        // Send a flash message to the user...
        Session::flash('success', 'You deposit request has been received. Activate your investment by making necessary payment');

        // Redirect back to the deposit page...
        return redirect()->back()->with('plan_name', $plan->name)->with('investment_amount', $request->investment_amount)->with('expected_amount', $expected_amount)->with('plan_interval', $plan->interval);
    }


    /**
     * Update the specified user deposit.
     *
     * @param  \App\Models\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function updateUserPlan($id)
    {

        // Find the deposit whose id = the $id posted.
        $deposit = Deposit::where('id', $id)->first();

        // get the deposit amount...
        $amount = $deposit->investment_amount;

        // get the deposit status before update...
        $status = $deposit->status;

        // Update the deposit...
        $deposit->update([
            $deposit->status = !$deposit->status,
            $deposit->updated_at = Carbon::now(),
        ]);

        if ($deposit) {
            // Update the user wallet table...

            // First find the user Wallet...
            $wallet = auth()->user()->wallet;

            // Update the user deposit column.
            $wallet->update([
                $wallet->deposit = !$status ? $wallet->deposit + $amount : $wallet->deposit - $amount,$wallet->investment = !$status ? $wallet->investment + $amount : $wallet->investment - $amount,
            ]);

            // check if this user was referred...
            $referrer = auth()->user()->referrer;


            // Get current date...
            $now = Carbon::now();

            // get 2% of the deposit amount...
            $refBonus = ( 2 * $amount ) / 100;

            // if this user has a referrer, give them the $refBonus...
            if ($referrer) {
                $earning = $referrer->wallet->earning;
                // update the referrer wallet (earning) with the $refBonus
                $referrer->wallet->update([
                    'earning' => !$status ? $earning + $refBonus : $earning - $refBonus,
                    'withdrawable' => !$status ? $earning + $refBonus : $earning - $refBonus,
                ]);

                // Also create a earning history for this referrer...
                $referrer->histories()->create([
                    'transaction_type' => 'Referral earning',
                    'amount' => $refBonus,
                    'status' => !$status ? 'success' : 'reversed',
                    'date' => $now,
                ]);
            }

            // Send a success flash message to the user...
            Session::flash('success', ' Deposit updated successfull.');
        } else {
            // Send an error flash message to the user...
            Session::flash('error', ' There was an error updating deposit. Please try again.');
        }

        // redirect back to the same page
        return redirect()->back();

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */

    public function deposits() {
        $userInActiveDeposits = auth()->user()->deposits->where('status', false);
        $userActiveDeposits = auth()->user()->deposits->where('status', true);
        return view('user.deposits', compact('userInActiveDeposits', 'userActiveDeposits'));
    }

    public function depositHistory() {

        $activeInvestments = Deposit::where('status', true)->get();
        $inActiveInvestments = Deposit::where('status', false)->get();
        $userAllInvestments = auth()->user()->deppsits;

        return view('user.deposit-history', compact('activeInvestments', 'inActiveInvestments'));
    }

    public function timeFormatter($time) {
        $now = Carbon::now();

        if ($time == "Weekly") {
            $time = $now->addDays(7);
        }
        if ($time == "Bi-Weekly") {
            $time = $now->addDays(14);
        }
        if ($time == "Monthly") {
            $time = $now->addMonth();
        }
        if ($time == "Two Months") {
            $time = $now->addMonths(2);
        }
        if ($time == "Three Months") {
            $time = $now->addMonths(2);
        }
        if ($time == "Four Months") {
            $time = $now->addMonths(4);
        }
        if ($time == "Five Months") {
            $time = $now->addMonths(5);
        }
        if ($time == "Six Months") {
            $time = $now->addMonths(6);
        }
        if ($time == "Eight Months") {
            $time = $now->addMonths(8);
        }
        if ($time == "Ten Months") {
            $time = $now->addMonths(10);
        }
        if ($time == "Twelve Months") {
            $time = $now->addMonths(12);
        }
        if ($time == "Fifteen Months") {
            $time = $now->addMonths(15);
        }
        if ($time == "Eighteen Months") {
            $time = $now->addMonths(18);
        }
        if ($time == "Twenty-four Months") {
            $time = $now->addMonths(24);
        }
        if ($time == "Thirty-six Months") {
            $time = $now->addMonths(36);
        }

        // return $time...
        return $time;
    }

    /**
     * return user earnings from here...
     */
}
