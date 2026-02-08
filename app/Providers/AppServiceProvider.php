<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Verified;
use App\Listeners\SendAdminAccessData;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Registra o evento de verificação para disparar o envio de dados
        // Nota: Isso só funcionará se o VerifyEmailController disparar 'new Verified($user)'
        Event::listen(
            Verified::class,
            SendAdminAccessData::class
        );
    }
}