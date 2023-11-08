<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if ($request->user() && $request->user()->isAdmin) {
            return $next($request);
        }

        // Redirect or return a response indicating unauthorized access
        return redirect()->route('unauthorized');
    }
}