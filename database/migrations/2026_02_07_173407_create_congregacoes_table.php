<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('congregacoes', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->boolean('status')->default(true); // true para ativa, false para inativa
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('congregacoes');
    }
};