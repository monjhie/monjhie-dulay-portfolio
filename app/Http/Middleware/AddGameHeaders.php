<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AddGameHeaders
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        $response->headers->set('Cross-Origin-Embedder-Policy', 'require-corp');
        $response->headers->set('Cross-Origin-Opener-Policy', 'same-origin');

        return $response;
    }
}