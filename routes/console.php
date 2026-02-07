<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

// Executa as migrações automaticamente todos os dias às 00:00
// O uso do --force é obrigatório em ambiente de produção
Schedule::command('migrate --force')->daily();

// Exemplo de como você poderá automatizar o CRM ou sistema de tickets no futuro:
// Schedule::command('emails:limpar-suspisciosos')->everySixHours();

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');