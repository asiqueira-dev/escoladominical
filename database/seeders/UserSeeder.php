<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Criando o SuperAdmin sem congregacao_id
        User::updateOrCreate(
            ['email' => 'contato@andersonls.com.br'],
            [
                'name' => 'Anderson Siqueira',
                'password' => Hash::make('41526389'),
                'role' => 'superadmin',
                'whatsapp' => '5516997616549',
                'congregacao_id' => null, // Agora permitido!
            ]
        );
    }
}