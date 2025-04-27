<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;



foreach (config('tenancy.central_domains') as $domain) {
    Route::domain($domain)->group(function () {
        // your actual routes
        Route::get('/', function () {
            return view('welcome');
        })->name('home');
    });
}



