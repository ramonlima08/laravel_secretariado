<?php

namespace App\Http\Middleware;

use Closure;

class CheckActivePageMiddleware
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

        $url = $request->getPathInfo();
        $controller = str_replace(['admin','/'],'',$url);
        
        $request->request->add(['pageActive' => $controller]);
        return $next($request);
    }
}
