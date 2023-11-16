<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('access_admin', function (User $user){
            return $user->access_level == 'admin';
    });

        Gate::define('access_comercial', function (User $user){
            return $user->access_level == 'comercial';
    });
        Gate::define('access_operacional', function (User $user){
            return $user->access_level == 'operacional';
    });
}
}