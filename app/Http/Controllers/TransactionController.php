<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\History;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userTransactions = Transaction::where('user_id', auth()->user()->id)->get();
        // dd($userTransactions);
        $allTransactions = Transaction::all();

        return view('user.transactions', compact('userTransactions', 'allTransactions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // Validate data...
        $this->validate($request, [
            'user' => 'bail|required|numeric',
            'type' => 'bail|required|string',
            'status' => 'bail|required|string',
            'description' => 'bail|required|string',
        ]);

        //get the username...
        $userId = User::where('id', $request->user)->first();
        $username = $userId->username;

        // create the transaction...
        $transaction = new Transaction();
        $transaction->user_id = $request->user;
        $transaction->username = $username;
        $transaction->type = $request->type;
        $transaction->status = $request->status;
        $transaction->description = $request->description;

        // Save to create a new record...
        $transaction->save();


        // Check if that waas successful...
        if ($transaction) {
            // send a success session message...
            Session::flash('success', ' Transaction created successfully. Check transaction table for details');
        } else {
            // send an error session message...
            Session::flash('error', ' There was an error creating the transaction. Check to make sure all fields are filled correctly.');
        }

        // redirect to the transaction page...
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        // Validate data...
        // $this->validate($request, [
        //     'user' => 'bail|required|string',
        //     'type' => 'bail|required|string',
        //     'status' => 'bail|required|string',
        //     'description' => 'bail|required|string',
        // ]);

        // //get the username...
        // $user = User::where('username', $request->user)->first();
        // $userId = $user->id;
        // $username = $user->username;

        // $transaction->update([
        //     $transaction->user_id = $userId,
        //     $transaction->username = $username,
        //     $transaction->type = $request->type,
        //     $transaction->status = $request->status,
        //     $transaction->description = $request->description,
        // ]);

        // // Check if ther update was successful...
        // if ($transaction) {
        //     // send a success session message...
        //     Session::flash('success', ' Transaction updated successfully. Check transaction table for details');
        // } else {
        //     // send an error session message...
        //     Session::flash('error', ' There was an error updating the transaction. Check to make sure all fields are filled correctly.');
        // }

        // return redirect()->back();


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        $deleted = $transaction->delete();

        // Check if the transaction record was deleted successfully...
        if ($deleted) {
            // Send a success flash message...
            Session::flash('success', ' Transaction records deleted successfully');
        } else {
            // Send an error flash message...
            Session::flash('error', ' There was a problem deleting transaction. Please try again and see if the proble persist');
        }

        // redirect to the dashboard...
        return redirect()->back();
    }

    public function earnings() {
        $allHistories = History::all();
        $userHistories = History::where('user_id', auth()->user()->id)->get();

        return view('user.earning-history', compact('allHistories', 'userHistories'));
    }

    /**
     * return all transactions
     *
     * @return void
     */
    public function allTransaction() {

        return view('user.transactions');
    }
}
