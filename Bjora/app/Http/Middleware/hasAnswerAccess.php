<?php

namespace Bjora\Http\Middleware;

use Closure;
use Bjora\Answer;
use Illuminate\Support\Facades\Auth;

class hasAnswerAccess
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
            Auth::user()->id == Answer::find($request['answer_id'])->owner_id
        ) ) {
            return $next($request);
        } else {
            return back()->with('failure', 'You are not authorized');
        }
    }
}
