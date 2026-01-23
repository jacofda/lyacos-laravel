<?php

namespace App\Http\Middleware;

use Closure;

class SetCacheHeaders
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $ttl  Cache time in minutes (default: 60)
     * @return mixed
     */
    public function handle($request, Closure $next, $ttl = 60)
    {
        $response = $next($request);

        // Only cache successful GET requests
        if ($request->isMethod('GET') && $response->isSuccessful()) {
            $seconds = $ttl * 60;
            
            // FORZA rimozione header sessione
            $response->headers->remove('Cache-Control');
            $response->headers->remove('Pragma');
            $response->headers->remove('Expires');
            
            // FORZA header pubblici
            $response->headers->set('Cache-Control', "public, max-age={$seconds}, s-maxage={$seconds}");
            $response->headers->set('Expires', gmdate('D, d M Y H:i:s \G\M\T', time() + $seconds));

        }

        return $response;
    }
}
