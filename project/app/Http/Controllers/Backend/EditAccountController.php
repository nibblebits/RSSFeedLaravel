<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditAccountRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;


class EditAccountController extends Controller
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
        return view('backend.account.edit');
    }

    /**
     * Stores updated profile information
     */
    public function store(EditAccountRequest $request)
    {
        Auth::user()->update($request->only(['name']));
        return back()->withSuccess('Profile Updated!')->withInput();
    }

}
