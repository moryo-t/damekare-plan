<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ReturnLocationMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);
        return $response;
    }
}
