<?php

namespace Bjora\Http\Middleware;

use Closure;
use Bjora\Question;
use Illuminate\Support\Facades\Auth;

class hasQuestionAccess
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
        if (Auth::user() && (
            Auth::user()->role == 'admin' ||
            Auth::user()->id == Question::find($request['id'])->owner_id
        ) ) {
            return $next($request);
        } else {
            return back()->with('failure', 'You are not authorized');
        }
    }
}
