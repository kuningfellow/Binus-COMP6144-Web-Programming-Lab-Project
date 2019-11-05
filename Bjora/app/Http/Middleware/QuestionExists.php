<?php

namespace Bjora\Http\Middleware;

use Closure;
use Bjora\Question;

class QuestionExists
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
        if (Question::find($request['id']) == NULL) {
            return back()->with('failure', 'The requested question does not exist');
        } else {
            return $next($request);
        }
    }
}
