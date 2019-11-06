<?php

namespace Bjora\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class notSameUser
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
        if ($request['user_id'] == Auth::user()->id) {
            return back()->with('failure', 'You cannot send a message to yourself');
        } else {
            return $next($request);
        }
    }
}
