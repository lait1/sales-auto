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


//Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

//Route::get('/auto', 'HomeController@auto');
Route::get('/auto/{slug}', 'HomeController@autoShow');
Route::get('/category/{slug}', 'HomeController@category');
Route::get('/category/{slug}/search', 'HomeController@filter');

Route::get('/post/{slug}', 'HomeController@post');
Route::get('/filter', 'HomeController@filter');
Route::get('/filter/getModel', 'HomeController@getModel');

Route::group([
    'namespace' => 'Auth',
    'middleware' => 'guest',
], function () {
    Route::get('/register', 'AuthController@registerFormShow');
    Route::post('/register', 'AuthController@register')->name('register');
    Route::get('/login', 'AuthController@loginFormShow');
    Route::post('/login', 'AuthController@login')->name('login');
});
Route::group([
    'middleware' => 'auth:web',
], function () {
    Route::get('/logout', 'Auth\AuthController@logout');
    Route::get('/buy/{id}', 'ClientController@buy');
    Route::get('/favorite', 'FavoriteController@index');
    Route::get('/favorite/{id}', 'FavoriteController@store');
    Route::get('/favorite/{id}/delete', 'FavoriteController@destroy');


    Route::get('/profile', 'ClientController@index');
    Route::post('/profile', 'ClientController@edit');
});


Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', 'Auth\Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\Admin\LoginController@login');
    Route::group(['middleware' => 'auth:admin'], function () {
        Route::get('/', 'API\DashboardController@index');
        Route::post('/logout', 'Auth\LoginController@logout');
    });
});
Route::group([
    'prefix' => 'api',
    'namespace' => 'api',
    'middleware' => 'auth:admin',
], function () {
    Route::resource('category', 'CategoryController');
    Route::resource('type', 'TypeController');
    Route::resource('model', 'ModelCarController');
    Route::resource('brand', 'BrandController');
    Route::resource('status', 'StatusController');
    Route::resource('city', 'CityController');
    Route::resource('client', 'ClientController');
    Route::get('client/blocked/{id}', 'ClientController@blocked');

    Route::resource('user', 'UserController');
    Route::get('user/blocked/{id}', 'UserController@blocked');
    Route::get('user/access', "UserController@show");

    Route::get('role', 'RoleController@index');
    Route::resource('auto', 'AutoController');
    Route::get('auto/draft/{id}', 'AutoController@draft');
    Route::post('auto/photo/{id}/create', 'AutoController@createPhoto');
    Route::delete('auto/photo/{id}/', 'AutoController@removePhoto');

    Route::resource('order', 'OrderController');
    Route::get('order/takework/{id}', 'OrderController@takework');
    Route::resource('post', 'PostController');
    Route::get('post/draft/{id}', 'PostController@draft');
});