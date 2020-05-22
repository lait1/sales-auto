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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/json', 'HomeController@getJson');

Route::group(['prefix'=>'admin' , 'namespace'=>'API'], function (){
    Route::get('/', 'DashboardController@index');
//    Route::resource('/auto', 'AutoController');
//    Route::resource('/client', 'ClientController');
//    Route::resource('/users', 'UserController');

});