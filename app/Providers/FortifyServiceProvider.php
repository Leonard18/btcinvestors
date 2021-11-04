<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        RateLimiter::for('login', function (Request $request) {
            return Limit::perMinute(3)->by($request->email.$request->ip());
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(3)->by($request->session()->get('login.id'));
        });

        // Login view...
        Fortify::loginView(function () {

            return view('auth.login');

        });

        // Register view...
        Fortify::registerView(function (Request $request) {
            // check if the session has ref_id stored...
            if ($request->has('ref_id')) {
                // store the session value...
                session(['referrer' => $request->query('ref_id')]);
            }
            return view('auth.register');
        });

        // Password Reset Link View...
        Fortify::requestPasswordResetLinkView(function () {
            return view('auth.password.forgot-password');
        });

        // Password Reset View after the user has received the reset password link to their email...
        Fortify::resetPasswordView(function ($request) {
            return view('auth.password.reset-password', ['request' => $request]);
        });

        Fortify::verifyEmailView(function() {
            return view('auth.email.verify-email');
        });

        Fortify::confirmPasswordView(function() {
            return view('auth.password.password-confirm');
        });

        Fortify::twoFactorChallengeView(function() {
            return view('auth.two-factor-challenge');
        });

    }
}
