<?php

use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\LocaleController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    // Languages
    Route::prefix('/admin/languages')->group(function () {
        Route::get('/', [LanguageController::class, 'index'])->name('languages.index');
        Route::get('/{language}', [LanguageController::class, 'show'])->name('languages.show');
    });

    // Locales
    Route::prefix('/admin/locales')->group(function () {
        Route::get('/', [LocaleController::class, 'index'])->name('locales.index');
        Route::get('/{locale}', [LocaleController::class, 'show'])->name('locales.show');
    });
});

require __DIR__.'/auth.php';
