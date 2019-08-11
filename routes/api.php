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

Route::get('/category', 'Api\CategoryController@index');

Route::get('/subcategory/{id}', 'Api\SubCategoryController@index');

Route::get('/item/{category_id}/{subcategory_id}', 'Api\ItemController@index');

Route::post('/temppos', 'Api\TempposController@store');

Route::get('/temppos', 'Api\TempposController@index');