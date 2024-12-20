<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
Route::get('/', function () {
    return view('home');
})->name('home');
// Registration related routes
Route::prefix('registration')->group(function () {
    // Role selection
    Route::get('/role', [RegistrationController::class, 'showRoleSelection'])->name('role.selection');
    Route::post('/role', [RegistrationController::class, 'storeRole'])->name('role.store');

    // Shelter role selection
    Route::get('/shelter/role', [RegistrationController::class, 'showShelterRoleSelection'])->name('registration.shelter.role_selection');
    Route::post('/shelter/role', [RegistrationController::class, 'storeShelterRole'])->name('role.shelterStore');

    // Registration form
    Route::get('/form', [RegistrationController::class, 'showRegistrationForm'])->name('registration.form');

    // Create registration
    Route::post('/create', [RegistrationController::class, 'create'])->name('registration.create');
});