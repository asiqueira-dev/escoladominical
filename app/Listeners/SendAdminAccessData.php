<?php

namespace App\Listeners;

use App\Mail\AdminAccessDataMail;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class SendAdminAccessData
{
    /**
     * Handle the event.
     */
    public function handle(Verified $event): void
    {
        $user = $event->user;

        Log::info("Listener SendAdminAccessData iniciado para: " . $user->email);

        // VERIFICAÇÃO DE SEGURANÇA
        // 1. O usuário deve ser 'admin' (usuários comuns do registro público são 'user')
        // 2. Deve ter um remember_token preenchido (usado para senha temporária)
        
        if ($user->role === 'admin' && !empty($user->remember_token)) {
            $password = $user->remember_token;

            try {
                Mail::to($user->email)->send(new AdminAccessDataMail($user, $password));
                
                Log::info("Email de dados de acesso enviado para: " . $user->email);

                // Limpa o token de senha temporária por segurança
                $user->forceFill([
                    'remember_token' => null,
                ])->save();

            } catch (\Exception $e) {
                Log::error("Erro ao enviar email de acesso: " . $e->getMessage());
            }
        } else {
            // Logs para explicar por que o e-mail NÃO foi enviado
            if ($user->role !== 'admin') {
                Log::warning("Email de dados de acesso NÃO enviado. Motivo: Usuário é '{$user->role}', não 'admin'.");
            } elseif (empty($user->remember_token)) {
                Log::warning("Email de dados de acesso NÃO enviado. Motivo: Campo remember_token (senha temp) está vazio.");
            }
        }
    }
}