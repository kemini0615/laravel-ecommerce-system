<?php

use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\Auth\NewPasswordController;
use App\Http\Controllers\Admin\Auth\PasswordResetLinkController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\KycVerificationController;
use Illuminate\Support\Facades\Route;

// ADMIN DASHBOARD
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard.index');
})->middleware(['auth:admin', 'verified'])->name('admin.dashboard');

Route::middleware('guest:admin')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('login', [AuthenticatedSessionController::class, 'create'])
            ->name('login');

        Route::post('login', [AuthenticatedSessionController::class, 'store']);

        Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
            ->name('password.request');

        Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
            ->name('password.email');

        Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
            ->name('password.reset');

        Route::post('reset-password', [NewPasswordController::class, 'store'])
            ->name('password.store');
    });

Route::middleware('auth:admin')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
            ->name('logout');

        // ADMIN PROFILE
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
        Route::put('/profile/information', [ProfileController::class, 'updateInformation'])->name('profile.update.information');
        Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.update.password');

        // ADMIN KYC VERIFICATION
        Route::get('/kyc-verification', [KycVerificationController::class, 'index'])->name('kyc.verification');
        Route::get('/kyc-versification/pending', [KycVerificationController::class, 'pending'])->name('kyc.verification.pending');
        Route::get('/kyc-versification/approved', [KycVerificationController::class, 'approved'])->name('kyc.verification.approved');
        Route::get('/kyc-versification/rejected', [KycVerificationController::class, 'rejected'])->name('kyc.verification.rejected');
        Route::get('/kyc-verification/{kyc_request}', [KycVerificationController::class, 'show'])->name('kyc.verification.show');
        Route::get('/kyc-verification/{kyc_request}/download', [KycVerificationController::class, 'download'])->name('kyc.verification.download');
        Route::put('/kyc-verification/{kyc_request}/update', [KycVerificationController::class, 'update'])->name('kyc.verification.update');
    });
