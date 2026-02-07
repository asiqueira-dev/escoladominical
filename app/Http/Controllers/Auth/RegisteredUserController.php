<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Congregacao;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    public function create(): View
    {
        $congregacoes = Congregacao::ativas()->orderBy('nome')->get();
        return view('auth.register', compact('congregacoes'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'whatsapp' => ['required', 'string', 'max:20'],
            'congregacao_id' => ['required', 'exists:congregacoes,id'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'whatsapp' => $request->whatsapp,
            'congregacao_id' => $request->congregacao_id,
            'password' => Hash::make($request->password),
            'role' => 'user', // Define um papel padrão para novos registros
        ]);

        // Dispara o envio do e-mail de verificação
        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard'));
    }
}