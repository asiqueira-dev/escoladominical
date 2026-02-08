<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Verified; // Certifique-se desta importação
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class VerifyEmailController extends Controller
{
    public function __invoke(Request $request): RedirectResponse
    {
        $user = User::findOrFail($request->route('id'));

        if (!hash_equals((string) $request->route('hash'), sha1($user->getEmailForVerification()))) {
            return redirect()->route('login')->with('error', 'O link de verificação é inválido.');
        }

        if ($user->hasVerifiedEmail()) {
            return redirect()->route('login')->with('verified_success', 'E-mail já confirmado!');
        }

        if ($user->markEmailAsVerified()) {
            // Este disparo ativa o Listener registrado no AppServiceProvider
            event(new Verified($user));
        }

        return redirect()->route('login')->with('verified_success', 'E-mail confirmado com sucesso!');
    }
}