<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;

class VerifyEmailCustom extends VerifyEmail
{
    /**
     * Build the mail representation of the notification.
     */
    public function toMail($notifiable)
    {
        // Gera a URL de verificação
        $verificationUrl = $this->verificationUrl($notifiable);

        // Retorna a View personalizada passando a URL e o Usuário
        return (new MailMessage)
            ->subject('Confirme seu acesso ao EBD Digital')
            ->view(
                'emails.verify-email', 
                ['url' => $verificationUrl, 'user' => $notifiable]
            );
    }
}