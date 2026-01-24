<?php

use App\Http\Controllers\Admin\InformationController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\LanguageLevelController;
use App\Http\Controllers\Admin\LanguageLevelTranslationController;
use App\Http\Controllers\Admin\LanguageTranslationController;
use App\Http\Controllers\Admin\LocaleController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
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

    // Languages Translations
    Route::prefix('/admin/languagesTranslations')->group(function () {
        Route::get('/', [LanguageTranslationController::class, 'index'])->name('languagesTranslations.index');
        Route::get('/{languagesTranslation}', [LanguageTranslationController::class, 'show'])->name('languagesTranslations.show');
    });

    // Languages Levels
    Route::prefix('/admin/languageLevels')->group(function () {
        Route::get('/', [LanguageLevelController::class, 'index'])->name('languageLevels.index');
        Route::get('/{languageLevel}', [LanguageLevelController::class, 'show'])->name('languageLevels.show');
    });

    // Languages Levels Translations
    Route::prefix('/admin/languageLevelTranslations')->group(function () {
        Route::get('/', [LanguageLevelTranslationController::class, 'index'])->name('languageLevelTranslations.index');
        Route::get('/{languageLevelTranslation}', [LanguageLevelTranslationController::class, 'show'])->name('languageLevelTranslations.show');
    });

    // Profiles
    Route::prefix('/admin/profiles')->group(function () {
        Route::post('/', [AdminProfileController::class, 'store'])->name('profiles.store');
        Route::put('/{profile}', [AdminProfileController::class, 'update'])->name('profiles.update');
        Route::post('/switch/{profile}', [AdminProfileController::class, 'switch'])->name('profiles.switch');

    });

    // Information
    Route::prefix('/admin/informations')->group(function () {
        Route::get('/', [InformationController::class, 'index'])->name('informations.index');
        Route::get('/{information}', [InformationController::class, 'show'])->name('informations.show');
        Route::post('/', [InformationController::class, 'store'])->name('informations.store');
        Route::put('/{information}', [InformationController::class, 'update'])->name('informations.update');
    });
});

require __DIR__.'/auth.php';
