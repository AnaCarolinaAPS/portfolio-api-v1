<?php

use App\Http\Controllers\Api\InformationController;
use Illuminate\Support\Facades\Route;

Route::middleware('api.key')->group(function () {
    Route::get('/informations/{language}', [InformationController::class, 'show'])->name('api.information.show');
});
