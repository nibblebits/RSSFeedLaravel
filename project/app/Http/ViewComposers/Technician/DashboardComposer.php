<?php

namespace App\Http\ViewComposers\Technician;

use App\Job;
use Illuminate\Contracts\Session\Session;
use Illuminate\View\View;

class DashboardComposer
{
    public $total_open_jobs;
    /**
     * Create a movie composer.
     *
     * @return void
     */
    public function __construct()
    {
        $this->total_open_jobs = Job::getTotalOpenJobs();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    { 
        $view->with('total_open_jobs', $this->total_open_jobs);
    }
}