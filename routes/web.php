<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'startGame'])->name('start_game');
Route::post('/prepare-game', [MainController::class, 'prepareGame'])->name('prepare_game');
Route::get('game', [MainController::class, 'game'])->name('game');
