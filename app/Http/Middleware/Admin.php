<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
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
        if (Auth::user()->isAdmin() !== true) {
            return response(json_encode(['error' => 'Unauthorized']), 401)
                ->header('Content-Type', 'text/json');
        }

        return $next($request);
    }
}
