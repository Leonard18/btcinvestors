<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserDetailsController extends Controller
{
    public function updateCountry(Request $request) {
        
        // validate the data... 
        $this->validate($request, [
            'country' => 'required|string|min:3|max:255',
        ]);

        // Update the data... 
        $updateCountry = User::where('id', auth()->user()->id)->update([
            'country' => $request->country,
        ]);

        // check if it was successful... 
        if (!$updateCountry) {
            // Send an error flash message... 
            Session::flash('error', ' There was an error updating your country info. Please try again.');
        } else {
            // Send an error flash message... 
            Session::flash('success', ' Your account country info has been updated successfully.');
        }

        // redirect back to the same page... 
        return redirect()->back();

    }

    public function updateState(Request $request) {
        
        // validate the data... 
        $this->validate($request, [
            'state' => 'required|string|min:3|max:255',
        ]);

        // Update the data... 
        $updateState = User::where('id', auth()->user()->id)->update([
            'state' => $request->state,
        ]);

        // check if it was successful... 
        if (!$updateState) {
            // Send an error flash message... 
            Session::flash('error', ' There was an error updating your state info. Please try again.');
        } else {
            // Send an error flash message... 
            Session::flash('success', ' Your account state info has been updated successfully.');
        }

        // redirect back to the same page... 
        return redirect()->back();

    }

    public function updateCity(Request $request) {
        
        // validate the data... 
        $this->validate($request, [
            'city' => 'required|string|min:3|max:255',
        ]);

        // Update the data... 
        $updateCity = User::where('id', auth()->user()->id)->update([
            'city' => $request->city,
        ]);

        // check if it was successful... 
        if (!$updateCity) {
            // Send an error flash message... 
            Session::flash('error', ' There was an error updating your account city info. Please try again.');
        } else {
            // Send an error flash message... 
            Session::flash('success', ' Your account city info has been updated successfully.');
        }

        // redirect back to the same page... 
        return redirect()->back();

    }

    public function updateZipCode(Request $request) {
        
        // validate the data... 
        $this->validate($request, [
            'zip_code' => 'required|string|min:3|max:50',
        ]);

        // Update the data... 
        $updateZipCode = User::where('id', auth()->user()->id)->update([
            'zip_code' => $request->zip_code,
        ]);

        // check if it was successful... 
        if (!$updateZipCode) {
            // Send an error flash message... 
            Session::flash('error', ' There was an error updating your account zip code info. Please try again.');
        } else {
            // Send an error flash message... 
            Session::flash('success', ' Your account zip code info has been updated successfully.');
        }

        // redirect back to the same page... 
        return redirect()->back();

    }

    public function updateHomeAddress(Request $request) {
        
        // validate the data... 
        $this->validate($request, [
            'home_address' => 'required|string|min:3|max:255',
        ]);

        // Update the data... 
        $updateHomeAddress = User::where('id', auth()->user()->id)->update([
            'home_address' => $request->home_address,
        ]);

        // check if it was successful... 
        if (!$updateHomeAddress) {
            // Send an error flash message... 
            Session::flash('error', ' There was an error updating your account home address info. Please try again.');
        } else {
            // Send an error flash message... 
            Session::flash('success', ' Your account home address info has been updated successfully.');
        }

        // redirect back to the same page... 
        return redirect()->back();

    }

    public function updateWalletAddress(Request $request) {
        
        // validate the data... 
        $this->validate($request, [
            'wallet_address' => 'required|string|min:3|max:255',
        ]);

        // Update the data... 
        $updateWalletAddress = User::where('id', auth()->user()->id)->update([
            'wallet_address' => $request->wallet_address,
        ]);

        // check if it was successful... 
        if (!$updateWalletAddress) {
            // Send an error flash message... 
            Session::flash('error', ' There was an error updating your account wallet address info. Please try again.');
        } else {
            // Send an error flash message... 
            Session::flash('success', ' Your account wallet address info has been updated successfully.');
        }

        // redirect back to the same page... 
        return redirect()->back();

    }

    // referral link... 
    public function referralLink() {
        return view('user.referral-link');
    }

    // User referrals... 
    public function referrals() {
        return view('user.referrals');
    }

   
}
