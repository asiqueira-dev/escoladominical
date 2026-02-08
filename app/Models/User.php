<?php

namespace App\Models;

use App\Notifications\VerifyEmailCustom;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'whatsapp',
        'congregacao_id',
        'role',
        'remember_token', // ADICIONADO: Necessário para salvar a senha temporária no AdminUserController
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Relacionamento com a Congregação
     */
    public function congregacao(): BelongsTo
    {
        return $this->belongsTo(Congregacao::class, 'congregacao_id');
    }

    /**
     * Verificadores de Nível de Acesso
     */
    public function isSuperAdmin(): bool 
    { 
        return $this->role === 'superadmin'; 
    }

    public function isAdmin(): bool 
    { 
        return $this->role === 'admin'; 
    }

    public function isUser(): bool 
    { 
        return $this->role === 'user'; 
    }

    /**
     * Sobrescreve o envio da notificação de verificação para usar a View customizada
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmailCustom);
    }
}