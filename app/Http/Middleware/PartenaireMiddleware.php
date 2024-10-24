<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PartenaireMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->partenaire) {
            return $next($request);
        }

        return redirect('/')->with('error', 'Accès refusé.');
    }
}
