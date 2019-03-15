<?php

// php artisan make:middleware RoleMiddleware
// used if I want certain user to access certain data.

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
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



        return $next($request);
    }
}
