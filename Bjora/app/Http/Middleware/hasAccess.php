<?php

namespace Bjora\Http\Middleware;

use Closure;
use Question;

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
        if (Auth::user() &&
            (
                Auth::user()->role == 'admin' ||
                Auth::user()->id == Question::find($request['question_id'])->owner
            )
        ) {
            return $next($request);
        } else {
            return redirect('welcome');
        }
    }
}
