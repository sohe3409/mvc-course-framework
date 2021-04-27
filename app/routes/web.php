<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloWorldController;
use App\Http\Controllers\GameController;

Route::get('/', function () {
    return view('index');
})->name('index');


Route::get('/hello', [HelloWorldController::class, 'hello'])->name('hello');
Route::get('/dice', [GameController::class, 'playGame'])->name('dice');
Route::post('/dice', [GameController::class, 'startGame']);


//
// // Added for mos example code
// Route::get('/hello-world', function () {
//   echo "Hello World";
// });
// Route::get('/hello-world-view', function () {
//   return view('message', [
//     'message' => "Hello World from within a view"
//   ]);
// });
// Route::get('/dice', function () {
//   return view('game');
// });
