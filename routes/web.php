<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RentalController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;

Route::get('/', [CarController::class, 'index'])->name('home');

Route::get('cars/{car}', [CarController::class, 'show'])->name('cars.show');

Route::middleware(['auth'])->get('cars/{car}/rentals/form', [RentalController::class, 'form'])->name('cars.rental.form');
Route::middleware(['auth'])->post('cars/{car}/rentals', [RentalController::class, 'store'])->name('cars.rental.store');

Route::get('/dashboard', [ProfileController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
