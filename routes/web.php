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


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/home', 'HomeController@index');
	Route::get('/main_menu', function(){ return view('main_menu');});
	Route::get('/new_create', 'NojikaController@new_create');
	Route::post('/regist_item', 'NojikaController@regist_item');
	Route::get('/check', 'NojikaController@check');
});
