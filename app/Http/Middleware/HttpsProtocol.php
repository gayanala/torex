<?php
/**
 * Created by PhpStorm.
 * User: W
 * Date: 10/15/2017
 * Time: 14:51
 */

namespace App\Http\Middleware;

use Closure;

class HttpsProtocol
{
    public function handle($request, Closure $next)
    {
        if (!$request->secure() && env('APP_ENV') !== 'local') {
            return redirect()->secure($request->getRequestUri());
        }

        return $next($request);
    }
}