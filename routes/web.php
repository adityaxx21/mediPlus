<?php

use Illuminate\Support\Facades\Route;


// Auth::routes();

// Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('{any}', function () {
        return view('layout.app');
    })->where('any', '.*');
// });