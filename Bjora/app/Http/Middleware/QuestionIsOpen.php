<?php

namespace Bjora\Http\Middleware;

use Closure;
use Bjora\Question;

class QuestionIsOpen
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
        if (Question::find($request['question_id'])->status == 'closed') {
            return back()->with('failure', 'The requested question is closed');
        } else {
            return $next($request);
        }
    }
}
