<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;


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
