<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Wallet;
use App\Models\UserDetails;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    
    public function index(){
        
        // return the users and their roles... 
        $users = User::where('id', '!=', 1)->get();
        
        return view('user.users.index', compact('users'));
    }
    
    public function create() {
        // 
    }
    
    public function store(Request $request) {
        
        // validate the user.... 
        $this->validate($request, [
            'firstName' => ['required', 'string', 'max:255'],
            'middleName' => ['sometimes', 'string', 'max:255'],
            'lastName' => ['sometimes', 'string', 'max:255'],
            'email' => ['bail', 'required', 'email', 'unique:users,email'],
            'phone' => ['bail', 'required', 'string', 'unique:users,phone'],
            'username' => ['bail', 'required', 'string', 'unique:users,username'],
            'investment' => ['numeric'],
            'earning' => ['numeric'],
            'withdrawable' => ['numeric'],
            'password' => ['confirm'],
        ]);

        // store the user.... 
        $user = new User();
        $user->first_name = $request->firstName;
        $user->middle_name = $request->middleName;
        $user->last_name = $request->lastName;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = $request->password;

        // save the user... 
        $user->save();

        // if the user was created, create their wallet as well... 
        if (! $user) {
            // send an error message... 
            Session::flash('error', 'There was an error creating new user. Pleasec check and try again.');
        }

        // Create the user wallet... 
        $user->wallet()->create([
            'investment' => $request->investment,
            'earning' => $request->earning,
            'withdrawable' => $request->withdrawable,
        ]);

        // Send a success message to the admin... 
        Session::flash('success', 'New user created successfully');

        // return the user to all users page... 
        return redirect()->route('user.index');

    }
    
    public function show(Request $request, User $user) {
        
        // return the user here..
        
        
    }
    
    public function edit(User $user) {
        // return the user with details
        return view('user.users.show', compact('user'));
    }
    
    public function update(Request $request, User $user) {
        // Update the user info here... 

        // Validate the details... 
        $this->validate($request, [
            'firstName' => ['required', 'string', 'max:255', 'min:2'],
            'middleName' => ['sometimes', 'string', 'max:255', 'min:2'],
            'lastName' => ['required', 'string', 'max:255', 'min:2'],
            'email' => ['bail', 'required', 'email', 'unique:users,email',],
            'phone' => ['bail', 'required', 'string', 'unique:users,phone',],
            'username' => ['bail', 'required', 'alpha_dash', 'unique:users,username',],
            'investment' => ['numeric'],
            'earning' => ['numeric'],
            'withdrawable' => ['numeric'],
        ]);

        // update the user... 
        $updated = $user->update([
            'first_name' => $request->firstName, 
            'middle_name' => $request->middleName, 
            'last_name' => $request->lastName, 
            'email' => $user->email ?? $request->email, 
            'phone' => $user->phone ?? $request->phone, 
            'username' => $user->username ?? $request->username, 
        ]);

        // check if the user was updated... 
        if (! $updated) {
            // send the admin back to the edit page... 
            Session::flas('error', 'There was an error updating the user. Check and try again.');
        }

        // if that was successful, update the user wallet... 
        $user->wallet()->update([
            'investment' => $request->investment,
            'earning' => $request->earning,
            'withdrawable' => $request->withdrawable,
        ]);

        // Send a success message... 
        Session::flash('success', 'User account updated successfully');

        // return back... 
        return back();

    }
    
    public function destroy(User $user) {
        // Delete the user
        $deleted = $user->delete();

        // check if the user was deleted... 
        if (! $deleted) {
            Session::flash('error', 'There was an error deleting user. Check and try again');
        }

        // Send a success message... 
        Session::flash('success', 'User deleted, successfully.');

        // return the admin back... 
        return back();
    }


   
}
