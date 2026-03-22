<?php

// app/Http/Middleware/RestrictByIp.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RestrictByIp
{
    public function handle(Request $request, Closure $next)
    {
        $allowedIps = [
            '185.103.72.141', // your IP
        ];

        if (app()->environment('staging')) {
            if (!in_array($request->ip(), $allowedIps)) {
                abort(403, 'Unauthorized');
            }
        }

        return $next($request);
    }
}
