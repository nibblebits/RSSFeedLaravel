<?php

namespace App\Http\Controllers\Backend\Staff;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateNewsCategoryRequest;
use App\Http\Requests\UpdateNewsCategoryRequest;
use App\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class CategoryController extends Controller
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
        $categories = NewsCategory::paginate(20);
        return view('backend.staff.categories.home', ['categories' => $categories]);
    }

    /**
     * Show create new news item form
     */
    public function create()
    {
        return view('backend.staff.categories.create');
    }


    /*
     * I had to resolve by id here as for some reason its not binding correctly
     */
    public function edit(NewsCategory $news_category)
    {
        return view('backend.staff.categories.edit', ['category' => $news_category]);
    }

    public function update(NewsCategory $news_category, UpdateNewsCategoryRequest $request)
    {
        $news_category->update($request->only('name'));
        return Redirect::to('manage/categories')->withSuccess('Category updated');
    }

        
    public function delete(NewsCategory $news_category)
    {
        $news_category->news()->detach();
        $news_category->rss_feeds()->detach();
        $news_category->delete();
        return Redirect::to('manage/categories')->withSuccess('News category deleted');
    }


    /**
     * Stores the new news item
     */
    public function store(CreateNewsCategoryRequest $request)
    {
        NewsCategory::create($request->only(['name']));
        return Redirect::to('manage/categories')->withSuccess('Category created!')->withInput();
    }


}
