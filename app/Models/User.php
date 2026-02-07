<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',          
        'whatsapp',        
        'congregacao_id',  
        'role',            
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Relacionamento com a Congregação.
     * Retorna null para Superadmins e Admins globais.
     */
    public function congregacao(): BelongsTo
    {
        return $this->belongsTo(Congregacao::class, 'congregacao_id');
    }

    /**
     * Verificadores de Nível de Acesso (Roles)
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
     * Helper para verificar se o usuário é vinculado a uma unidade específica
     */
    public function hasCongregacao(): bool
    {
        return !is_null($this->congregacao_id);
    }
}