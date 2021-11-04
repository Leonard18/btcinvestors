<?php

namespace App\Providers;

use App\Models\Plan;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
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
        View::composer(['user.investment-plans', 'user.dashboard', 'user.make-deposit'], function($view) {
            $view->with('plans', Plan::all());
            }
        );
        
    }
}
