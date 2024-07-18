<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;

class MessagesGlobal
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        Session::flash('addSuccess', 'Success! Registered Successfully');
        Session::flash('LoginSuccess', 'Success! You are now logged in');
        Session::flash('LogoutSuccess', 'Success! You are now logged out');
        Session::flash('loginError', 'Failed! Invalid Email or Password');
        return $next($request);
    }
}
