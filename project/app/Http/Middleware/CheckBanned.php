<?php

namespace App\Http\Middleware;

use Closure;

class CheckBanned
{
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->banned) {
            auth()->logout();

            $message = 'Your account has been disabled';
            return redirect()->route('login')->withMessage($message);
        }

        return $next($request);
    }
}