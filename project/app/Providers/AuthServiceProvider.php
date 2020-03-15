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

        /**
         * In a better implementation we could check for user roles here instead,
         * user roles do not exist yet
         */
        Gate::define('change-user-password', function ($user) {
            return $user->account_type == 'admin';
        });

        Gate::define('creation-of-news', function($user) {
            return $user->account_type == 'admin';
        });

        Gate::define('creation-of-rss-feeds', function($user) {
            return $user->account_type == 'admin';
        });

        Gate::define('creation-of-categories', function($user) {
            return $user->account_type == 'admin';
        });


        Gate::define('create-new-users', function($user) {
            return $user->account_type == 'admin';
        });

    }
}
