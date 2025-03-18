<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\ToolController;
use App\Http\Controllers\LogAccessController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\ProductController;


Auth::routes();

//Route caricamento dell'immagine:
Route::put('/upload-image', [ImageUploadController::class, 'upload'])->name('upload.image');

// Mostra il form per richiedere il reset della password
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])
    ->name('password.request');

// Invia il link di reset
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])
    ->name('password.email');

// Mostra il form per inserire la nuova password
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])
    ->name('password.reset');

// Salva la nuova password
Route::post('password/reset', [ResetPasswordController::class, 'reset'])
    ->name('password.update');


Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
});

Route::get('/user', function () {
    return view('users.user'); // Aggiungi il prefisso "users."
})->middleware('auth')->name('user');


Route::get('/testconn', [ToolController::class, 'testConnections'])->name('testconn');

Route::get('/log-accessi', [LogAccessController::class, 'index'])->name('log.accessi');

Route::post('/reset.log', [LogAccessController::class, 'reset'])->name('log.reset');

//Route per login
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('loginUser');

//Route per logout
Route::post('/logout', [UserController::class, 'logout'])->name('logoutUser');

//Route per la registrazione
Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('showRegistrationForm');
Route::post('/register', [UserController::class, 'register'])->name('registerUser');

//Route per products
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
