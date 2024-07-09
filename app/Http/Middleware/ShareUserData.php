<?php

namespace App\Http\Middleware;

use App\Models\AccessLevelSpace;
use Closure;
use Illuminate\Support\Facades\Auth;


class ShareUserData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $accessLevelSpaces = AccessLevelSpace::all();
            $spaces = Auth::user()->spaces()->get();
            view()->share('accessLevel', $accessLevelSpaces);
            view()->share('spaces', $spaces);
        }
        return $next($request);
    }
}
