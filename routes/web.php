<?php

use App\Http\Controllers\User\Customer\ProfileController as CustomerProfileController;
use App\Http\Controllers\User\Customer\DashboardController as CustomerDashboardController;
use App\Http\Controllers\User\Vendor\DashboardController as VendorDashboardController;
use Illuminate\Support\Facades\Route;

// HOME
Route::get('/', function () {
    return view('user.home.index');
});

Route::middleware(['auth', 'verified'])->group(function () {
    // CUSTOMER DASHBOARD
    Route::get('/dashboard', [CustomerDashboardController::class, 'index'])->name('dashboard');

    // CUSTOMER PROFILE
    Route::get('/profile', [CustomerProfileController::class, 'index'])->name('profile');
    Route::put('/profile/information', [CustomerProfileController::class, 'updateInformation'])->name('profile.update.information');
    Route::put('/profile/password', [CustomerProfileController::class, 'updatePassword'])->name('profile.update.password');
});

Route::middleware(['auth', 'verified'])
    ->prefix('vendor')
    ->name('vendor.')
    ->group(function () {
        // VENDOR DASHBOARD
        Route::get('/dashboard', [VendorDashboardController::class, 'index'])->name('dashboard');
    });

require __DIR__ . '/auth.php';
