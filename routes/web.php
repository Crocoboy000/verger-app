<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\CustomAuth;
use App\Http\Middleware\IsAdmin;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Public Routes
Route::get('/', fn() => redirect("/login"));
Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login']);

// Protected Routes
Route::middleware([CustomAuth::class])->group(function () {
    // Dashboard & Logout
    Route::get('/dashboard', [AuthController::class, 'dashboard']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/dashboard/filter', [AuthController::class, 'filter']);

    // Admin-only routes
    Route::middleware(IsAdmin::class)->group(function () {
        // Register routes
        Route::get('/register', [AuthController::class, 'showRegister']);
        Route::post('/register', [AuthController::class, 'register']);

        // Verger & Statut management
        Route::get('/verger/add', [AuthController::class, 'showAddVerger']);
        Route::post('/verger/add', [AuthController::class, 'addVerger']);

        Route::get('/statut/{login}', [AuthController::class, 'showAddStatut'])->name('statut');
        Route::post('/statut/add', [AuthController::class, 'addStatut']);
    });
});

