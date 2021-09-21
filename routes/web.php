<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\RegisterController;

// DASHBOARD
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// REGISTER
Route::get('/register', [RegisterController::class, 'index'])->name('register');

//It will inherit the same route name from above line
Route::post('/register', [RegisterController::class, 'store'])->name('register');

// POST
Route::get('/posts', function () {
    // return view('welcome');
    return view('posts.index');
});
