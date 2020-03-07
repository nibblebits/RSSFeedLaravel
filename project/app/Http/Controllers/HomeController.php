<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\News;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
   
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function index()
    {
        $news = News::all();

        return view('home.index', ['news' => $news]);
    }
}
