<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Criando o SuperAdmin já verificado
        User::updateOrCreate(
            ['email' => 'contato@andersonls.com.br'],
            [
                'name' => 'Anderson Siqueira',
                'password' => Hash::make('41526389'),
                'role' => 'superadmin',
                'whatsapp' => '5516997616549',
                'congregacao_id' => null,                
                'email_verified_at' => Carbon::now(), 
            ]
        );
    }
}