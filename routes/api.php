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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/show', "ItemController@showAll");
//Route::get

Route::post('/user', "UserController@register");
Route::get('/user', "UserController@showAll");
Route::get('/user/{id}', "UserController@find");
Route::delete('/user/{id}', "UserController@delete");
Route::put('/user/{id}', "UserController@update");


Route::post('/item', "ItemController@register");
Route::delete('/item/{id}', "ItemController@delete");
Route::put('/item/{id}', "ItemController@update");
Route::get('/item', "ItemController@showAll");
Route::get('/item/{id}', "ItemController@find");
Route::get('/showAll', "UserController@join");

?>