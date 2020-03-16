<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\RssFeed;
use Illuminate\Support\Facades\Auth;
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
        $this->middleware(['auth']);
    }


    public function index()
    {
        return redirect('account/dashboard');
    }

    public function dashboard()
    {
        $rss_feeds = RssFeed::all();
        return view('backend.dashboard', ['rss_feeds' => $rss_feeds]);
    }

    public function logout()
    {
        Auth::logout();
        return Redirect::to('/')->withSuccess('You have logged out')->withInput();
    }
}
