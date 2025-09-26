<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HtmlSpecialchars
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $input = array_filter($request->all());

        array_walk_recursive($input, function (&$input) {
            $input = htmlspecialchars($input, ENT_QUOTES);
        });

        $request->merge($input);


        return $next($request);
    }
}
