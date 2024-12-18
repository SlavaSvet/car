<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RentalController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;

use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ReviewController;

Route::get('/', [CarController::class, 'index'])->name('home');
Route::get('cars/{car}', [CarController::class, 'show'])->name('cars.show');


Route::middleware('auth')->group(function () {
    Route::get('cars/{car}/rentals/form', [RentalController::class, 'form'])->name('cars.rental.form');
    Route::post('cars/{car}/rentals', [RentalController::class, 'store'])->name('cars.rental.store');
    Route::post('/rentals/{rental}/cancel', [RentalController::class, 'cancel'])->name('rentals.cancel');

    Route::post('/favorites/toggle/{car}', [FavoriteController::class, 'toggle'])->name('favorites.toggle');
    Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index');
    Route::delete('/favorites/{favorite}', [FavoriteController::class, 'remove'])->name('favorites.remove');

    Route::post('/cars/{car_id}/reviews', [ReviewController::class, 'store'])->name('reviews.store');
    Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');

    Route::get('/dashboard', [ProfileController::class, 'index'])->middleware(['auth'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
