<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdmin\DashboardController as SuperAdminDash;
use App\Http\Controllers\Admin\DashboardController as AdminDash;
use App\Http\Controllers\User\DashboardController as UserDash;

Route::get('/', function () {
    return redirect()->route('login');
});

/**
 * Redirecionador Inteligente
 * Ao aceder a /dashboard, o sistema verifica o nível do utilizador e envia-o para a rota correta.
 */
Route::get('/dashboard', function () {
    $user = auth()->user();
    
    if ($user->isSuperAdmin()) {
        return redirect()->route('superadmin.dashboard');
    }
    
    if ($user->isAdmin()) {
        return redirect()->route('admin.dashboard');
    }

    return redirect()->route('user.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    
    /**
     * Rotas exclusivas de Super Administrador
     */
    Route::prefix('superadmin')
        ->name('superadmin.')
        ->middleware('superadmin')
        ->group(function () {
            Route::get('/dashboard', [SuperAdminDash::class, 'index'])->name('dashboard');
        });

    /**
     * Rotas exclusivas de Administrador
     */
    Route::prefix('admin')
        ->name('admin.')
        ->middleware('admin')
        ->group(function () {
            Route::get('/dashboard', [AdminDash::class, 'index'])->name('dashboard');
        });

    /**
     * Rotas exclusivas de Usuário
     */
    Route::prefix('user')
        ->name('user.')
        ->middleware('user')
        ->group(function () {
            Route::get('/dashboard', [UserDash::class, 'index'])->name('dashboard');
        });

    /**
     * Perfil do Utilizador (Acessível a todos os níveis)
     */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::patch('/profile/avatar', [ProfileController::class, 'updateAvatar'])->name('profile.avatar');
});

require __DIR__.'/auth.php';