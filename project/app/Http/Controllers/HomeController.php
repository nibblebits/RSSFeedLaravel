<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\News;
use Nibblebits\RssFeedReader\Exceptions\BadRssFeedException;

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
        $news = News::orderBy('article_dated', 'desc')->take(12)->get();

        return view('frontend.index', ['news' => $news]);
    }
}
