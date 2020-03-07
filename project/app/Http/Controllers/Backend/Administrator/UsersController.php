<?php

namespace App\Http\Controllers\Backend\Administrator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function index(Request $request)
    {
        $query = $request->get('query');
        $users = Auth::user()->orderBy('created_at', 'desc')->where('name', 'like', '%' . $query . '%')
                    ->orWhere('email', 'like', '%' . $query . '%')->paginate(10);
        return view('backend.admin.user.users', compact('users'));
    }


    public function view(User $user)
    {
        return view('backend.admin.user.user', compact('user'));
    }

    public function ban_user(User $user)
    {
        $user->banned = true;
        $user->save();
        return Redirect::to("user/" . $user->id)->withSuccess('User\'s account is now disabled')->withInput();
    }

    public function unban_user(User $user)
    {
        $user->banned = false;
        $user->save();
        return Redirect::to("user/" . $user->id)->withSuccess('User\'s account is now enabled again')->withInput();
    }


    public function change_password(User $user)
    {
        return view('dbackend.admin.user.change_password', compact('user'));
    }

    public function change_password_submit(User $user, Request $request)
    {
        User::find($user->id)->update(['password'=> Hash::make($request->new_password)]);
        return Redirect::to("user/" . $user->id)->withSuccess('Password updated')->withInput();

    }


    public function login_to_account(Request $request)
    {
        $user_id = $request->get('user_id');
        $user = User::where('id', $user_id)->get()->first();
        if (!$user)
            abort(404);

        // We are about to login to the user account but lets set a session value so we can come back to admin when we are done
        $request->session()->put('user_controlled_by_admin', true);
        $request->session()->put('admin_user_id', Auth::user()->id);
        $request->session()->save();
        Auth::loginUsingId($user_id);
        return Redirect::to("home")->withSuccess('Now using system as ' . $user->name)->withInput();
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
        return Redirect::to("home")->withSuccess('Session Restored')->withInput();
    }
  
}
