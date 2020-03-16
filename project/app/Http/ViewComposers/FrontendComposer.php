<?php

namespace App\Http\ViewComposers;

use App\NewsCategory;
use Illuminate\View\View;

class FrontendComposer
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
        $view->with('categories', NewsCategory::orderBy('name', 'asc')->get());
    }
}