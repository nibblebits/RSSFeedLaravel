<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\News;
use App\NewsCategory;

class NewsController extends Controller
{
   
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function category(NewsCategory $category)
    {
        $news = $category->news()->orderBy('article_dated', 'desc')->paginate(12);
        return view('frontend.news.category', ['category' => $category, 'news' => $news]);
    }

    public function latest()
    {
        $news = News::orderBy('article_dated', 'desc')->paginate(12);
        return view('frontend.news.latest', ['news' => $news]);

    }
}
