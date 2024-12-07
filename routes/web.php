<?php

use App\Http\Controllers\CarController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CarController::class, 'index'])->name('home');

Route::get('cars/{car}', [CarController::class, 'show'])->name('cars.show');
