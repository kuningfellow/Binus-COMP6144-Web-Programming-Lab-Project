<?php

namespace Bjora\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class hasUserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request['role'] != NULL && $request['role'] == 'admin' && (Auth::user()->role??'member') != 'admin') {
            return back()->with('failure', 'Only administrator can promote member to admin');
        } else if (Auth::user() && (
            Auth::user()->role == 'admin' ||
            Auth::user()->id == $request['user_id']
        ) ) {
            return $next($request);
        } else {
            return back()->with('failure', 'You are not authorized to edit the user');
        }
    }
}
