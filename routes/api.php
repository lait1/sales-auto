<?php

use Illuminate\Http\Request;

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
////});
//Route::resource('post', 'api\PostController');
//Route::post('auto/photo/{id}/create', 'api\AutoController@createPhoto');
//Route::delete('auto/photo/{id}/', 'api\AutoController@removePhoto');
//Route::group([
//    'prefix' => 'v1',
//    'namespace' => 'api',
//    'middleware' => 'auth:admin',
//], function (){
//    Route::resource('category', 'CategoryController');
//    Route::resource('type', 'TypeController');
//    Route::resource('model', 'ModelCarController');
//    Route::resource('brand', 'BrandController');
//    Route::resource('status', 'StatusController');
//    Route::resource('city', 'CityController');
//    Route::resource('client', 'ClientController');
//    Route::get('client/blocked/{id}', 'ClientController@blocked');
//    Route::resource('user', 'UserController');
//    Route::get('user/blocked/{id}', 'UserController@blocked');
//    Route::get('role', 'RoleController@index');
//    Route::resource('auto', 'AutoController');
//    Route::get('auto/draft/{id}', 'AutoController@draft');
//    Route::resource('order', 'OrderController');
//    Route::resource('post', 'PostController');
//    Route::get('post/draft/{id}', 'PostController@draft');
//});