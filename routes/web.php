<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RideController;
use Illuminate\Support\Facades\Route;

Route::permanentRedirect('/dashboard', '/')
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', [HomeController::class, 'show'])
    ->name('home');

Route::resource('/attracties', RideController::class)
    ->parameters(['attracties' => 'ride'])
    ->middleware('admin')
    ->withoutMiddlewareFor(['index', 'show'], 'admin');

Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])
        ->name('index');
});

require __DIR__ . '/auth.php';
