<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::table('users', function (Blueprint $table) {
        // Adicionamos nullable() antes de constrained()
        $table->foreignId('congregacao_id')
              ->nullable() 
              ->after('id')
              ->constrained('congregacoes')
              ->nullOnDelete(); // Opcional: define null se a congregação for deletada
              
        $table->string('whatsapp')->after('email');
    });
}

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['congregacao_id']);
            $table->dropColumn(['congregacao_id', 'whatsapp']);
        });
    }
};