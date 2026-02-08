<?php

namespace App\Listeners;

use App\Mail\AdminAccessDataMail;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class SendAdminAccessData
{
    public function handle(Verified $event): void
    {
        $user = $event->user;

        // Log para depuração (pode remover depois de testar)
        Log::info("Evento de verificação detectado para: " . $user->email);

        if ($user->role === 'admin' && !empty($user->remember_token)) {
            $password = $user->remember_token;

            try {
                Mail::to($user->email)->send(new AdminAccessDataMail($user, $password));
                
                Log::info("Email de dados de acesso enviado para: " . $user->email);

                $user->forceFill([
                    'remember_token' => null,
                ])->save();
            } catch (\Exception $e) {
                Log::error("Erro ao enviar email de acesso: " . $e->getMessage());
            }
        }
    }
}