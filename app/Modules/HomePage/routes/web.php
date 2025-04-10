<?php

use App\Modules\HomePage\Http\Controllers\HomePageController;
use Illuminate\Support\Facades\Route;

Route::prefix('homepage')->group(function () {
    Route::get('/', [HomePageController::class, 'index'])->name('homepage');
    Route::post('/store', [HomePageController::class, 'store'])->name('homepage.store');
});
