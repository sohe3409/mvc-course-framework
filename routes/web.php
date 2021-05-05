<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloWorldController;
use App\Http\Controllers\GameController;

Route::get('/', function () {
    return view('index');
})->name('index');


Route::get('/hello', [HelloWorldController::class, 'hello'])->name('hello');

Route::get('/game', [GameController::class, 'playGame'])->name('game');
Route::post('/game', [GameController::class, 'startGame']);
