<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\Wallet;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'first-name' => ['required', 'string', 'max:255'],
            'middle-name' => ['string', 'max:255'],
            'last-name' => ['required', 'string', 'max:255'],
            'username' => [
                'bail',
                'required',
                'alpha_dash',
                'max:255',
                Rule::unique(User::class),
            ],
            'email' => [
                'bail',
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'phone' => [
                'bail',
                'required',
                'string',
                'min:10',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
        ])->validate();

        // Get the referrer_id...by pulling i from the session...
        $referrer = User::whereUsername(session()->pull('referrer'))->first();

        $user = User::create([
            'first_name' => $input['first-name'],
            'middle_name' => $input['middle-name'],
            'last_name' => $input['last-name'],
            'username' => $input['username'],
            'email' => $input['email'],
            'referrer_id' => $referrer ? $referrer->id : null,
            'phone' => $input['phone'],
            'password' => Hash::make($input['password']),
        ]);

        // Create a wallet for the user...
        Wallet::create([
            'user_id' => $user->id,
            'deposit' => 0.00,
            'investment' => 0.00,
            'earning' => 0.00,
            'withdrawable' => 0.00,
        ]);
	
	//assign the user to a role... 
	$user->givePermissionTo('investor');

        // send the user a notifiaction email... 
        $user->notify(new RegistrationEmail($user));

        return $user;

    }
}
