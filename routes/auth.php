<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\ShelterController;
use App\Http\Controllers\SettingsController;

/*
|--------------------------------------------------------------------------
| Guest Routes (nem hitelesített felhasználóknak)
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {
    // Role kiválasztása regisztrációnál
    Route::get('register/role', [RegisteredUserController::class, 'showRole'])->name('role');
    Route::post('register/role', [RegisteredUserController::class, 'storeRole'])->name('registration.store.role');

    // Shelter szerepkör kiválasztása
    Route::get('register/shelter/role', [RegisteredUserController::class, 'showShelterRole'])->name('registration.shelter.role_selection');
    Route::post('register/shelter/role', [RegisteredUserController::class, 'storeShelterRole'])->name('registration.shelter.role_selection_store');

    // Regisztráció
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);

    // Bejelentkezés
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    // Jelszó visszaállítás
    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.store');

    // Shelter létrehozási űrlap megjelenítése
    Route::get('/shelter/create', [ShelterController::class, 'create'])->name('shelter.create');
});

/*
|--------------------------------------------------------------------------
| Authenticated Routes (hitelesített felhasználóknak)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    // settings
    Route::prefix('settings')->name('settings.')->group(function () {
        Route::get('/', [SettingsController::class, 'index'])->name('index');

        Route::get('/profile', [SettingsController::class, 'editProfile'])->name('profile');
        Route::put('/profile', [SettingsController::class, 'updateProfile'])->name('profile.update');

        Route::get('/password', [SettingsController::class, 'editPassword'])->name('password');

        Route::get('/delete', [SettingsController::class, 'editDelete'])->name('delete');
        Route::delete('/delete', [SettingsController::class, 'deleteAccount'])->name('delete.confirm');

    });

    // Shelter létrehozás, setup
    Route::post('/shelter', [ShelterController::class, 'store'])->name('shelter.store');
    Route::get('/shelter/setup', [ShelterController::class, 'setup'])->name('shelter.setup');

    // Email verifikáció
    Route::get('verify-email', EmailVerificationPromptController::class)->name('verification.notice');
    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');
    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    // Jelszó megerősítés és frissítés
    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])->name('password.confirm');
    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);
    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    // Kijelentkezés
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});
