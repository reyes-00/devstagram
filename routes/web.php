<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;


Route::get('/register',[RegisterController::class,'index'])->name('register');
Route::post('/register',[RegisterController::class,'store']);

// Login
Route::get('login',[LoginController::class,'index'])->name('login');
Route::post('login',[LoginController::class,'store']);

// Cerrar sesion usuario
Route::post('/logout',[LogoutController::class,'store'])->name('logout');

// Post
Route::get('/{user:username}',[PostController::class,'index'])->name('posts.index');
Route::get('/posts/create',[PostController::class,'create'])->name('posts.create');
Route::post('/posts',[PostController::class,'store'])->name('posts.store');
// Imagencontroller
Route::post('/imagenes',[ImagenController::class,'store'])->name('imagenes.store');
Route::get('/{user:username}/posts/{post}',[PostController::class,'show'])->name('posts.show');
