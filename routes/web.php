<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\loginController;
use App\Http\Controllers\Auth\logoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserPostController;

Route::get('/', function() {
    return view('home');  
})->name('home');

// DASHBOARD
Route::get('/dashboard', [DashboardController::class, 'index'])
->name('dashboard');

Route::get('/user/{user:username}/posts', [UserPostController::class, 'index'])->name('user.posts');

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

// LOGIN
Route::get('/login', [LoginController::class, 'index'])->name('login');

//It will inherit the same route name from above line
Route::post('/login', [LoginController::class, 'store']);

// REGISTER
Route::get('/register', [RegisterController::class, 'index'])->name('register');

//It will inherit the same route name from above line
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::post('/posts', [PostController::class, 'store']);
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

Route::post('/posts/{post}/likes', [PostLikeController::class, 'store'])->name('posts.likes');
Route::delete('/posts/{post}/likes', [PostLikeController::class, 'destroy']);