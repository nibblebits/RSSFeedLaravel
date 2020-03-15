<?php

namespace App\Http\Controllers\Backend\Staff\Administrator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminChangePasswordRequest;
use App\Http\Requests\CreateNewUserRequest;
use App\Mail\UserRegistration;
use App\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

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
        return view('backend.staff.admin.user.users', compact('users'));
    }


    public function view(User $user)
    {
        return view('backend.staff.admin.user.user', compact('user'));
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


    public function create()
    {
        return view('backend.staff.admin.user.create');        
    }
    
    public function store(CreateNewUserRequest $request)
    {
        $password = uniqid();
        $user = new User();
        $user->email = $request->email;
        $user->name = $request->name;
        $user->account_type = 'admin';
        $user->setPassword($password);
        $user->save();

        Mail::to($request->email)->send(new UserRegistration($user, $password));
        return Redirect::to("/users")->withSuccess('User created An Email Has Been Sent To Them')->withInput();

    }
    
    public function change_password(User $user)
    {
        return view('backend.staff.admin.user.change_password', compact('user'));
    }

    public function change_password_submit(User $user, AdminChangePasswordRequest $request)
    {
        $user->setPassword($request->new_password)->save();
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
