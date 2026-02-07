<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Artisan;

class CheckMigrations
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // O parâmetro --force é indispensável em produção para evitar a pergunta "Do you really wish to run..."
        \Illuminate\Support\Facades\Artisan::call('migrate', [
            '--force' => true,
        ]);

        return $next($request);
    }
}