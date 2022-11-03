<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['namespace' => 'Api'], function () {
    //Цитаты
    Route::group(['namespace' => 'Quote'], function () {
        Route::get('quote', [App\Http\Controllers\Api\Quote\QuoteController::class, 'index'])->name('api.quote.index');
        Route::post('quote/create', [App\Http\Controllers\Api\Quote\QuoteController::class, 'create'])->name('api.quote.create');
    });

});
