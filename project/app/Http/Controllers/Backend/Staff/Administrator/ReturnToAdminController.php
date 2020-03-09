<?php

namespace App\Http\Controllers\Backend\Staff\Administrator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Contracts\Session\Session;

class ReturnToAdminController extends Controller
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


    public function restore_to_admin(Request $request)
    {
        $controlled_by_admin = $request->session()->get('user_controlled_by_admin');
        if (!$controlled_by_admin)
        {
            abort(401);
        }
        $admin_user_id = $request->session()->get('admin_user_id');
        $request->session()->forget('user_controlled_by_admin');
        $request->session()->forget('admin_user_id');
        $request->session()->flush();
        Auth::loginUsingId($admin_user_id);
        return Redirect::to("users")->withSuccess('Session Restored')->withInput();
    }
  
}
