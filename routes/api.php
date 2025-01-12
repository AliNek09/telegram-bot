<?php

use App\Http\Controllers\Bot\BotController;
use App\Http\Controllers\Games\RussianRouletteController;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

Route::prefix('/bot/webhook')->controller(BotController::class)->group(function(){
    Route::prefix('/games')->group(function () {
        Route::post('/roulette', [RussianRouletteController::class, 'roulette']);
    });
   Route::post('message', 'message');
});


//Route::prefix('test')->get('log', function () {
//   Log::channel('telegram')->info('Test log');
//   return true;
//});

