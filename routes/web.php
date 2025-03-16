<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
});

use App\Http\Controllers\ToolController;

Route::get('/testconn', [ToolController::class, 'testConnections'])->name('testconn');

use App\Http\Controllers\LogAccessController;
Route::get('/log-accessi', [LogAccessController::class, 'index'])->name('log.accessi');



Route::post('/reset.log', [LogAccessController::class, 'reset'])->name('log.reset');
