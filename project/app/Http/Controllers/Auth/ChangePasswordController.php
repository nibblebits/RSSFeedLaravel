<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;


class ChangePasswordController extends Controller
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
        return view('backend.password.change');
    }


    public function store(ChangePasswordRequest $request)
    {        
        Auth::user()->setPassword($request->password)->save();

        return back()->withSuccess('Password was changed')->withInput();

    }
}
