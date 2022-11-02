<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'homepage'])->name('homepage');

Auth::routes();

//Admin
Route::group(['middleware' => ['auth']], function(){

    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');

    //Цитаты
    Route::group(['namespace' => 'Quote'], function(){
        Route::resource('quote', '\App\Http\Controllers\Quote\QuoteController')->except(['show'])->names('quote');
    });

    Route::group(['middleware' => ['auth', 'role:root']], function(){

        //Роли
        Route::group(['namespace' => 'Role'], function(){
            Route::resource('role', '\App\Http\Controllers\Role\RoleController')->names('role');
        });

        //Правила / Разрешения
        Route::group(['namespace' => 'Permission'], function(){
            Route::resource('permission', '\App\Http\Controllers\Permission\PermissionController')->names('permission');
        });

        //Пользователи
        Route::group(['namespace' => 'User'], function() {
            Route::resource('user', '\App\Http\Controllers\User\UserController')->except(['show'])->names('user');
        });
    });

});

