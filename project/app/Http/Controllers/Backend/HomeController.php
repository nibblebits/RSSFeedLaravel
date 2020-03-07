<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
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
        return view('dashboard/generic/edit');
    }

    public function change_password()
    {
        return view('dashboard/generic/change_password');
    }

    public function change_password_submit(Request $request)
    {
        request()->validate([
            'password' => 'required|min:8|confirmed',
        ]);

        Auth::user()->password = Hash::make($request->password);
        Auth::user()->save();

        return Redirect::to("edit")->withSuccess('Password was updated')->withInput();

    }

    /**
     * Responsible for all profile picture uploads for all users
     */
    public function upload_profile_picture(Request $request)
    {
        $file = $request->file('profile_image');
        if (!$file)
        {
            return Redirect::to("edit")->withErrors(['upload_error' => 'No file provided'])->withInput();
        }

        //Move Uploaded File
        $filename = uniqid(). '.' . $file->getClientOriginalExtension();
        $destinationPath = 'uploads';
        $file->move($destinationPath, $filename);
        $abs_path = $destinationPath . '/' . $filename;
        Auth::user()->replaceProfileImage($abs_path);
        return Redirect::to("edit")->withSuccess('Profile Image Updated!')->withInput();
    }

    /**
     * Stores updated profile information
     */
    public function update(Request $request)
    {
        request()->validate([
            'name' => 'required|min:5',
            'about_me' => 'required|min:100',
            'address' => 'required|max:255',
            'telephone' => 'required|telephone',
            'receive_emails' => 'boolean'
        ]);

        if (!$request->has('receive_emails'))
        {
            $request->merge(['receive_emails' => 0]);
        }
        Auth::user()->update($request->only(['name', 'about_me', 'address', 'telephone', 'receive_emails']));
        return Redirect::to("edit")->withSuccess('Profile Updated!')->withInput();
    }

}
