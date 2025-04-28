<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TenantAuth\LoginController;
use App\Http\Controllers\TenantAuth\RegisterController;
use App\Http\Controllers\TenantDashboardController;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
*/

Route::middleware([
    'web',
    'tenancy.enforce',
])->group(function () {
    Route::get('/', function () {
        return view('tenant.welcome');
    });

    // Auth routes voor tenant gebruikers
    Route::middleware('guest')->group(function () {
        Route::get('/login', [LoginController::class, 'showLoginForm'])->name('tenant.login');
        Route::post('/login', [LoginController::class, 'login']);
        Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('tenant.register');
        Route::post('/register', [RegisterController::class, 'register']);
    });

    Route::middleware('auth')->group(function () {
        Route::post('/logout', [LoginController::class, 'logout'])->name('tenant.logout');
        Route::get('/dashboard', [TenantDashboardController::class, 'index'])->name('tenant.dashboard');
    });
});
