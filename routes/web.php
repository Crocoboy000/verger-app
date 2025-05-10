<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\CustomAuth;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);

Route::middleware(CustomAuth::class)->group(function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::get('/verger/add', [AuthController::class, 'showAddVerger']);
Route::post('/verger/add', [AuthController::class, 'addVerger']);


Route::get('/statut/add', [AuthController::class, 'showAddStatut']);
Route::post('/statut/add', [AuthController::class, 'addStatut']);

Route::get('/dashboard/filter', [AuthController::class, 'filter']);
