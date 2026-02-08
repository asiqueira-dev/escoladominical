<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; 

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(Request $request): RedirectResponse
    {
        // Busca o usuário pelo ID vindo da Rota
        $user = User::find($request->route('id'));

        // Se o usuário não existir, redireciona para login com erro
        if (! $user) {
            return redirect()->route('login')->with('error', 'Usuário não encontrado.');
        }

        // Valida o Hash da URL
        if (! hash_equals((string) $request->route('hash'), sha1($user->getEmailForVerification()))) {
            return redirect()->route('login')->with('error', 'O link de verificação é inválido ou expirou.');
        }

        // Se já estiver verificado, apenas avisa
        if ($user->hasVerifiedEmail()) {
            return redirect()->route('login')->with('verified_success', 'E-mail já confirmado! Faça login.');
        }

        // Marca como verificado e dispara o evento
        if ($user->markEmailAsVerified()) {
            event(new Verified($user));
            Log::info("Usuário verificado com sucesso: " . $user->email);
        }

        return redirect()->route('login')->with('verified_success', 'E-mail confirmado com sucesso! Sua conta está ativa.');
    }
}