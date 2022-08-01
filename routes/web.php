<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ComentarioController;

Route::get('/', HomeController::class)->name('home');

Route::get('/register',[RegisterController::class,'index'])->name('register');
Route::post('/register',[RegisterController::class,'store']);

// Login
Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('login',[LoginController::class,'store']);
// Home
// Cerrar sesion usuario
Route::post('/logout',[LogoutController::class,'store'])->name('logout');
// Perfil
Route::get('{user:username}/edita-perfil',[PerfilController::class,'index'])->name('perfil.index');
Route::post('{user:username}/edita-perfil',[PerfilController::class,'store'])->name('perfil.store');


// Post
Route::get('/{user:username}',[PostController::class,'index'])->name('posts.index');
Route::get('/posts/create',[PostController::class,'create'])->name('posts.create');
Route::post('/posts',[PostController::class,'store'])->name('posts.store');
// Imagencontroller
Route::post('/imagenes',[ImagenController::class,'store'])->name('imagenes.store');
Route::get('/{user:username}/posts/{post}',[PostController::class,'show'])->name('posts.show');
Route::delete('/post/{post}',[PostController::class,'destroy'])->name('posts.destroy');

// Comentarios
Route::post('/{user:username}/post/{post}',[ComentarioController::class,'store'])->name('comentarios.store');

// Likes
Route::post('/post/{post}/likes',[LikeController::class,'store'])->name('posts.likes.store');
Route::delete('/post/{post}/likes',[LikeController::class,'destroy'])->name('posts.likes.destroy');

// Followers
Route::post('/{user:username}/follow',[FollowerController::class,'store'])->name('users.follow');
Route::delete('/{user:username}/unfollow',[FollowerController::class,'destroy'])->name('users.unfollow');
