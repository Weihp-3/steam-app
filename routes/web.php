<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
});

Route::get('/dashboard', function (\Illuminate\Http\Request $request) {
    if ($request->user()->isAdmin()) {
        return redirect()->route('admin.dashboard');
    } elseif ($request->user()->isPegawai()) {
        return redirect()->route('pegawai.dashboard');
    }
    return redirect()->route('user.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Role-Based Route Groups
|--------------------------------------------------------------------------
*/

// Admin only
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');
    });

// Pegawai (+ admin can also access)
Route::middleware(['auth', 'role:pegawai,admin'])
    ->prefix('pegawai')
    ->name('pegawai.')
    ->group(function () {
        Route::get('/dashboard', function () {
            return view('pegawai.dashboard');
        })->name('dashboard');
    });

// Regular user
Route::middleware(['auth', 'role:user,pegawai,admin'])
    ->prefix('user')
    ->name('user.')
    ->group(function () {
        Route::get('/dashboard', function () {
            return view('user.dashboard');
        })->name('dashboard');
    });

require __DIR__.'/auth.php';

