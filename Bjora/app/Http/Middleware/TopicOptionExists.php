<?php

namespace Bjora\Http\Middleware;

use Closure;
use Bjora\TopicOption;

class TopicOptionExists
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
        if (TopicOption::find($request['topic_id']) == NULL) {
            return back()->with('failure', 'The requested topic does not exist');
        } else {
            return $next($request);
        }
    }
}
