<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isDev
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user()->isDev()) {
            return $next($request);
        } else {
            return redirect('cek-user');
        }
    }
}
