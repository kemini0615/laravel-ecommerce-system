<?php

use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\ProfileController;
use Illuminate\Support\Facades\Route;

// HOME
Route::get('/', function () {
    return view('user.home.index');
});

Route::middleware(['auth', 'verified'])->group(function () {
    // USER DASHBOARD
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // USER PROFILE
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('/profile/information', [ProfileController::class, 'updateInformation'])->name('profile.update.information');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.update.password');
});

require __DIR__ . '/auth.php';
