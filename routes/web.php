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
    // 登陆
    Route::match(['get', 'post'],'/login', 'UserController@login')->name('login');

    // 图片管理
    Route::group(['prefix' => 'picture'], function () {
        Route::match(['get', 'post'],'/', 'PictureController@upload');
        Route::get('/list', 'PictureController@getList');
        Route::get('/delete/{id?}', 'PictureController@delete')->name('pictureDelete');
    });

    Route::get('/index','IndexController@index')->name('home');
});