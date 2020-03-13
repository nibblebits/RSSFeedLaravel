<?php

namespace App\Http\Controllers\Backend\Staff;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateNewNewsItemRequest;
use App\Http\Requests\EditProfileRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\News;
use App\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;


class NewsController extends Controller
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


    public function index(Request $request)
    {
        $query = $request->get('query');
        $category = $request->get('category');

        $categories = NewsCategory::orderBy('name', 'desc')->get();
        $news = new News();
        if ($category != '') {
            // We are filtering by a category here, lets change the news we get
            $news = NewsCategory::findOrFail($category)->news();
        }

        if ($query != '') {
            $news = $news->where('title', 'like', '%' . $query . '%')
                ->orWhere('description', 'like', '%' . $query . '%');
        }


        $news = $news->orderBy('article_dated', 'desc')->paginate(10);
        return view('backend.staff.news.home', ['news' => $news, 'categories' => $categories]);
    }

    /**
     * Show create new news item form
     */
    public function create()
    {
        $categories = NewsCategory::all();
        return view('backend.staff.news.create', ['categories' => $categories]);
    }


    public function edit(News $news)
    {
        $categories = NewsCategory::all();
        $news->load('categories');
        return view('backend.staff.news.edit', ['news' => $news, 'categories' => $categories]);
    }

    public function update(News $news, UpdateNewsRequest $request)
    {
        $news->update($request->only(['title', 'description', 'url', 'image_url']));
        $news->categories()->detach();
        foreach($request->categories as $category)
        {
            $news->categories()->attach($category);
        }

        return Redirect::to('manage/news')->withSuccess('Updated succesfully');
    }


    
    /**
     * Stores the new news item
     */
    public function store(CreateNewNewsItemRequest $request)
    {
        $news = News::create($request->only(['title', 'description', 'url', 'image_url']));
        foreach($request->categories as $category)
        {
            $news->categories()->attach($category);
        }
        return Redirect::to('manage/news')->withSuccess('News item added!')->withInput();
    }


}
