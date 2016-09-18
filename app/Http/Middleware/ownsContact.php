<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class ownsContact
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
        $contact = $request->route('contactId');
        
        if($contact->user->id == Auth::user()->id)
            return $next($request);
    }
}
