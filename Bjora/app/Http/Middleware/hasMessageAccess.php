<?php

namespace Bjora\Http\Middleware;

use Closure;
use Bjora\Message;
use Illuminate\Support\Facades\Auth;

class hasMessageAccess
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
            Auth::user()->id == Message::find($request['message_id'])->recipient_id
        ) ) {
            return $next($request);
        } else {
            return back()->with('failure', 'You are not authorized to edit the message');
        }
    }
}
