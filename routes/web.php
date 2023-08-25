<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\AjaxController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['web'])->group(function () {
    Route::get('/new-game', [GameController::class, 'startNewGame'])->name('new-game');
    Route::post('/play-game', [GameController::class, 'playGame'])->name('play-game');
    Route::post('/make-guess', [GameController::class, 'makeGuess'])->name('make-guess');
    Route::get('/scores', [GameController::class, 'displayScores'])->name('display-scores');
    Route::post('/ajax/make-guess', [AjaxController::class, 'makeGuess'])->name('make-guess-');
});

