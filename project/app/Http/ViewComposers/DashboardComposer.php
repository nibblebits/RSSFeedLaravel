<?php

namespace App\Http\ViewComposers;

use App\Job;
use Illuminate\Contracts\Session\Session;
use Illuminate\View\View;

class DashboardComposer
{
    /**
     * Create a movie composer.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    { 
        $view->with('user_controlled_by_admin', request()->session()->get('user_controlled_by_admin'));
    }
}