<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;

class CheckMigrations
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            // Executa o migrate. O Laravel ignora se não houver nada novo.
            $exitCode = Artisan::call('migrate', ['--force' => true]);

            // Se o código de saída for 0 e houver texto de "Migrating", logamos o sucesso
            if ($exitCode === 0 && str_contains(Artisan::output(), 'Migrating')) {
                Log::info('Middleware: Novas migrações aplicadas com sucesso.', [
                    'output' => Artisan::output()
                ]);
            }
        } catch (\Exception $e) {
            Log::error('Middleware: Falha ao tentar rodar migrate no acesso do usuário.', [
                'error' => $e->getMessage()
            ]);
        }

        return $next($request);
    }
}