<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class VerifyEmailController extends Controller
{
    public function __invoke(Request $request): RedirectResponse
    {
        // Busca o usuário pelo ID da rota, sem exigir Auth
        $user = User::findOrFail($request->route('id'));

        // Validação de segurança do hash
        if (!hash_equals((string) $request->route('hash'), sha1($user->getEmailForVerification()))) {
            return redirect()->route('login')->with('error', 'O link de verificação é inválido.');
        }

        if ($user->hasVerifiedEmail()) {
            return redirect()->route('login')->with('verified_success', 'E-mail já confirmado!');
        }

        if ($user->markEmailAsVerified()) {
            // Dispara o evento que usaremos para enviar o SEGUNDO e-mail
            event(new Verified($user));
        }

        // Redireciona para o login com a flag de sucesso para o alerta
        return redirect()->route('login')->with('verified_success', 'E-mail confirmado com sucesso!');
    }
}