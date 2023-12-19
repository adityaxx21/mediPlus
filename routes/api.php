<?php

use App\Http\Controllers\AntrianController;
use App\Http\Controllers\ClinicController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::post('/login', [UserController::class, 'login']);

Route::middleware('api')->group(function () {
    Route::resource('products', ProductController::class);
});


// Route::middleware(['auth:sanctum'])->group(function () {
    
    // Clinics REST
    Route::resource('clinics', ClinicController::class);
    
    // User REST
    Route::get('/users', [UserController::class, 'users']);
    Route::get('/currentUser', [UserController::class, 'currentUser']);

    // Antrians REST
    Route::resource('antrians', AntrianController::class);
    Route::get('/antrians/clinics/{idClinic}', [AntrianController::class, 'antrianClinic']);
    Route::get('/antrians/clinics/{idClinic}/users/{idUser}', [AntrianController::class, 'antrianUser']);
    Route::post('/createBooking', [AntrianController::class, 'createBooking']);
// });
