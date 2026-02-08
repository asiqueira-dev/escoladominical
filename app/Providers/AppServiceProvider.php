<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Verified;
use App\Listeners\SendAdminAccessData;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Registra o listener para o evento de Verificação concluída
        Event::listen(
            Verified::class,
            SendAdminAccessData::class
        );
    }
}