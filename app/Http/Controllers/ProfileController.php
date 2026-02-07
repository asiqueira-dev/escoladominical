<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $user->fill($request->validated());

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Atualiza o avatar do usuário automaticamente via AJAX/Form.
     */
    public function updateAvatar(Request $request): RedirectResponse
    {
        $request->validate([
            'avatar' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
        ]);

        $user = Auth::user();
        $path = public_path('assets/img/user');

        // Cria a pasta se não existir
        if (!File::isDirectory($path)) {
            File::makeDirectory($path, 0777, true, true);
        }

        // Nome do arquivo: ID + Nome Limpo
        $safeName = str_replace(' ', '_', strtolower($user->name));
        $fileName = $user->id . '_' . $safeName . '.' . $request->avatar->extension();

        // Deleta imagem antiga se existir
        if ($user->avatar && File::exists(public_path($user->avatar))) {
            File::delete(public_path($user->avatar));
        }

        // Move a nova imagem
        $request->avatar->move($path, $fileName);

        // Salva o caminho no banco
        $user->avatar = 'assets/img/user/' . $fileName;
        $user->save();

        return Redirect::route('profile.edit')->with('status', 'avatar-updated');
    }

    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        // Deleta a foto antes de deletar o usuário
        if ($user->avatar && File::exists(public_path($user->avatar))) {
            File::delete(public_path($user->avatar));
        }

        Auth::logout();
        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}