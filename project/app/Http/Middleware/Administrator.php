<?php 
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Administrator {

    public function handle($request, Closure $next)
    {

        if (Auth::check() && Auth::user()->account_type == 'admin')
        {
            return $next($request);
        }

        return redirect('home');

    }

}