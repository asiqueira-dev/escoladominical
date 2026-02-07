<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdmin\DashboardController as SuperAdminDash;
use App\Http\Controllers\Admin\DashboardController as AdminDash;
use App\Http\Controllers\User\DashboardController as UserDash;

Route::get('/', function () {
    return redirect()->route('login');
});

// Redirecionador inteligente: ao acessar /dashboard, ele joga o usuário para sua respectiva URL
Route::get('/dashboard', function () {
    $user = auth()->user();
    if ($user->isSuperAdmin()) return redirect()->route('superadmin.dashboard');
    if ($user->isAdmin()) return redirect()->route('admin.dashboard');
    return redirect()->route('user.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    
    // Rotas SuperAdmin
    Route::prefix('superadmin')->name('superadmin.')->group(function () {
        Route::get('/dashboard', [SuperAdminDash::class, 'index'])->name('dashboard');
    });

    // Rotas Admin
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminDash::class, 'index'])->name('dashboard');
    });

    // Rotas User
    Route::prefix('user')->name('user.')->group(function () {
        Route::get('/dashboard', [UserDash::class, 'index'])->name('dashboard');
    });

    // Perfil (Comum a todos)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::patch('/profile/avatar', [ProfileController::class, 'updateAvatar'])->name('profile.avatar');
});

require __DIR__.'/auth.php';