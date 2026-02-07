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

        // Criamos o usuário com uma senha aleatória temporária
        // O campo congregacao_id fica null por padrão para Admins
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'whatsapp' => $request->whatsapp,
            'password' => Hash::make(Str::random(16)),
            'role' => 'admin',
            'congregacao_id' => null,
        ]);

        // Dispara o evento de registro do Laravel para enviar o e-mail de verificação
        event(new Registered($user));

        return redirect()->route('superadmin.admins.index')
            ->with('status', 'admin-created');
    }
}