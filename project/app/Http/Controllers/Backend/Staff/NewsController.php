<?php

namespace App\Http\Controllers\Backend\Staff;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditProfileRequest;
use App\News;
use App\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;


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

        $categories = NewsCategory::all();
        $news = News::orderBy('created_at', 'desc');
        if ($query != '')
        {
            $news = $news->where('title', 'like', '%' . $query . '%')
                    ->orWhere('description', 'like', '%' . $query . '%');
        }
        if ($category != '')
        {
            $news = $news->where('category', $category);
        }

        $news = $news->paginate();
        return view('backend.staff.news', ['news' => $news, 'categories' => $categories]);
    }

    public function dashboard()
    {
        return view('backend.dashboard');
    }


    /**
     * Stores updated profile information
     */
    public function update(EditProfileRequest $request)
    {
        Auth::user()->update($request->only(['name']));
        return Redirect::to("edit")->withSuccess('Profile Updated!')->withInput();
    }

}
