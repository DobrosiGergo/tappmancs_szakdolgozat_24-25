<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShelterController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

// Kezdőlap
Route::get('/', function () {
    return view('welcome');
});

// Publikus menhely lista
Route::get('/shelters', [ShelterController::class, 'index'])->name('shelters.index');
Route::get('/shelters/{shelter}', [ShelterController::class, 'show'])->name('shelters.show');


/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard (csak bejelentkezett, verifikált usernek)
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

  
});

/*
|--------------------------------------------------------------------------
| Auth Routes (Breeze vagy hasonló)
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';
