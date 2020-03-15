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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('input');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

//ログインボタンからのリンク
Route::get('/login/{social}', 'Auth\LoginController@socialLogin')->where('social', 'facebook');
//コールバック用
Route::get('/login/{social}/callback', 'Auth\LoginController@handleProviderCallback')->where('social', 'facebook');

Route::post('/MLog/input'  , 'MLogController@input');