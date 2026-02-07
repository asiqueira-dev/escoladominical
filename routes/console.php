<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;
use Illuminate\Support\Facades\Log;

// Agendador: Tenta rodar a cada minuto de forma independente
Schedule::call(function () {
    try {
        Log::info('Cron Job: Iniciando tentativa de migrate automática.');
        
        Artisan::call('migrate', ['--force' => true]);
        
        $output = Artisan::output();
        Log::info('Cron Job: Migrate finalizada com sucesso.', ['output' => $output]);
    } catch (\Exception $e) {
        Log::error('Cron Job: Erro ao executar migrate.', ['error' => $e->getMessage()]);
    }
})->everyMinute();

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');