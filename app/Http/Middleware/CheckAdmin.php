<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        // Admins e SuperAdmins geralmente podem ver áreas de Admin
        if (auth()->check() && (auth()->user()->isAdmin() || auth()->user()->isSuperAdmin())) {
            return $next($request);
        }

        abort(403, 'Acesso restrito a Administradores.');
    }
}