<?php

use App\Http\Controllers\Api\InformationController;
use App\Http\Controllers\Api\SpokenLanguageController;
use Illuminate\Support\Facades\Route;

Route::middleware('api.key')->group(function () {
    Route::get('/informations/{language}', [InformationController::class, 'show'])->name('api.information.show');

    Route::get('/languages/{language}', [SpokenLanguageController::class, 'show'])->name('api.language.show');
});
