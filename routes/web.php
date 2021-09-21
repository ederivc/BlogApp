<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\loginController;
use App\Http\Controllers\Auth\logoutController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', function() {
    return view('home');  
})->name('home');

// DASHBOARD
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/logout', [LogoutController::class, 'store'])->name('logout');

// LOGIN
Route::get('/login', [LoginController::class, 'index'])->name('login');

//It will inherit the same route name from above line
Route::post('/login', [LoginController::class, 'store']);

// REGISTER
Route::get('/register', [RegisterController::class, 'index'])->name('register');

//It will inherit the same route name from above line
Route::post('/register', [RegisterController::class, 'store']);

// POST
Route::get('/posts', function () {
    // return view('welcome');
    return view('posts.index');
});
