<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthBasic
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, $next)
    {
        // dd(config());
        // if (config('auth.basic.once')) {
        //     return $next($request);
        // }

        // return response('You shall not pass!', 401, ['WWW-Authenticate' => 'Basic']);
        return Auth::onceBasic('email') ?: $next($request);
        // return $next($request);
    }
}
