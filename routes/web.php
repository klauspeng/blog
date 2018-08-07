<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', 'Auth\LoginController@test');

// 后台路由
Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::get('/test', 'LoginController@test');
});