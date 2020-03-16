<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        view()->composer(
            'frontend.*',
            'App\Http\ViewComposers\FrontendComposer'
        );

        view()->composer(
            'backend.*',
            'App\Http\ViewComposers\DashboardComposer'
        );
    }
}
