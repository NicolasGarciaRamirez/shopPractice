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

Route::get('/', [\App\Http\Controllers\ProductsController::class, 'index']);

Route::group(['prefix' => 'Products'], function(){
    Route::post('/Save', [\App\Http\Controllers\ProductsController::class, 'save']);
    Route::post('/Update/{products}', [\App\Http\Controllers\ProductsController::class, 'update']);
});

Route::get('/createUser', function(){
    $user = new \App\Models\User();

    $user->name = 'nicolas';
    $user->email = 'nicolas@nicolas.com';
    $user->password = bcrypt('Saray1420');

    $user->save();
});

Route::get('login', function(){
//    \Auth::login(\App\Models\User::find(1));
    return \Auth::user();
});

