<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\Registered;

class AdminUserController extends Controller
{
    public function index()
    {
        $admins = User::where('role', 'admin')->get();
        return view('superadmin.admins.index', compact('admins'));
    }

    public function create()
    {
        return view('superadmin.admins.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'whatsapp' => ['required', 'string', 'max:20'],
        ]);

        // Geramos uma senha aleatória
        $temporaryPassword = Str::random(12);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'whatsapp' => $request->whatsapp,
            'password' => Hash::make($temporaryPassword),
            'role' => 'admin',
            'congregacao_id' => null,
            // Guardamos a senha em texto plano no remember_token APENAS até ele confirmar o email
            'remember_token' => $temporaryPassword, 
        ]);

        // Dispara o evento que envia o PRIMEIRO e-mail (verificação)
        event(new Registered($user));

        return redirect()->route('superadmin.admins.index')
            ->with('status', 'admin-created');
    }
}