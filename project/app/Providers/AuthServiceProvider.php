<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('change-user-password', function ($user) {
            return $user->account_type == 'admin';
        });

        Gate::define('creation-of-news', function($user) {
            return $user->account_type == 'admin';
        });

        Gate::define('creation-of-rss-feeds', function($user) {
            return $user->account_type == 'admin';
        });
    }
}
