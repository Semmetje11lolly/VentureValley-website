<?php

namespace App\Http\Middleware;

use Closure;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Gate::denies('admin')) {
            abort(404);
        }

        return $next($request);
    }
}
