<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\CheckMigrations;
use App\Http\Middleware\CheckSuperAdmin;
use App\Http\Middleware\CheckAdmin;
use App\Http\Middleware\CheckUser;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // Registra o middleware para rodar em todas as rotas WEB
        $middleware->append(CheckMigrations::class);

        // Registo dos aliases para os níveis de acesso
        $middleware->alias([
            'superadmin' => CheckSuperAdmin::class,
            'admin'      => CheckAdmin::class,
            'user'       => CheckUser::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();