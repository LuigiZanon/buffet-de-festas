<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define("access_admin", function (User $user){
            return $user->access_level == 'admin';
        });
        Gate::define('access_comercial', function (User $user){
            return $user->access_level == 'comercial';
    });
    }
}
