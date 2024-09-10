<?php

namespace App\Http\Middleware;

use App\Enums\SystemRoles;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SystemDashboardAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (Auth::check() && Auth::user()->hasAnyRole(SystemRoles::ArrayRolesSystem())) {
            return $next($request);
        }

        return redirect()->route('500');
    }
}
