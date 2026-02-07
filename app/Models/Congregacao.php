<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Congregacao extends Model
{
    use HasFactory;

    /**
     * O nome da tabela associada à model. 
     * @var string
     */
    protected $table = 'congregacoes';

    /**
     * Atributos que podem ser preenchidos em massa.
     * @var array<int, string>
     */
    protected $fillable = [
        'nome',
        'status',
    ];

    /**
     * Conversão de tipos de atributos.
     * @var array<string, string>
     */
    protected $casts = [
        'status' => 'boolean',
    ];

    /**
     * Scope para buscar apenas congregações ativas.     
     */
    public function scopeAtivas($query)
    {
        return $query->where('status', true);
    }
}