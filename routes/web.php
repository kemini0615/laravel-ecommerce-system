<?php

use App\Http\Controllers\User\DashboardController;
use Illuminate\Support\Facades\Route;

// HOME
Route::get('/', function () {
    return view('user.home.index');
});

// USER DASHBOARD
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

require __DIR__ . '/auth.php';
