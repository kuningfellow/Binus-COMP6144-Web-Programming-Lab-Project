<?php

namespace Bjora\Http\Middleware;

use Closure;
use Bjora\Message;

class MessageExists
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
        if (Message::find($request['message_id']) == NULL) {
            return back()->with('failure', 'The requested message does not exist');
        } else {
            return $next($request);
        }
    }
}
