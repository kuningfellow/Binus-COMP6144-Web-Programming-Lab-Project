<?php

namespace Bjora\Http\Middleware;

use Closure;
use Bjora\Answer;

class AnswerExists
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
        if (Answer::find($request['answer_id']) == NULL) {
            return back()->with('failure', 'The requested answer does not exist');
        } else {
            return $next($request);
        }
    }
}
