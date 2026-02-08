<?php

namespace App\Listeners;

use App\Mail\AdminAccessDataMail;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Mail;

class SendAdminAccessData
{
    /**
     * Handle the event.
     */
    public function handle(Verified $event): void
    {
        $user = $event->user;

        // Só envia se for do tipo 'admin' e tiver uma senha temporária no remember_token
        if ($user->role === 'admin' && !empty($user->remember_token)) {
            $password = $user->remember_token;

            // Envia o segundo e-mail
            Mail::to($user->email)->send(new AdminAccessDataMail($user, $password));

            // Limpa o remember_token por segurança
            $user->forceFill([
                'remember_token' => null,
            ])->save();
        }
    }
}