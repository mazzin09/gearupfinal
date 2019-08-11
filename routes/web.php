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

Route::get('/pos', function () {
    return view('pos.index');
});


Route::resource('category', 'CategoryController');
Route::resource('subcategory', 'SubcategoryController');
Route::resource('item', 'ItemController');
Route::resource('purchase', 'PurchaseController');
Route::resource('sale', 'SaleController');
Route::resource('vendor', 'VendorController');
// database nachahine haru
Route::resource('purchasereport', 'PurchasereportController');
Route::resource('salereport', 'SalereportController');
Route::resource('stockreport', 'StockreportController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/subcategory/purchase/{id}', 'SubcategoryController@getChildCategory');

Route::get('/item/purchase/{cat}/{child}', 'SubcategoryController@getItem');
