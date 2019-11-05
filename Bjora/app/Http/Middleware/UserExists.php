<?php

namespace Bjora\Http\Middleware;

use Closure;
use Bjora\User;

class UserExists
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
        if (User::find($request['user_id']) == NULL) {
            return back()->with('failure', 'The requested user does not exist');
        } else {
            return $next($request);
        }
    }
}
