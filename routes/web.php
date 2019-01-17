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
    if(Auth::check()) {
        return redirect()->route('home');
    }
    
    return view('auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/stores', 'StoreController@index')->name('stores')->middleware('auth');
Route::get('/listadmin', 'AdminController@index')->name('listadmin')->middleware('auth');
Route::get('/products', 'ProductController@index')->name('products')->middleware('auth');
Route::get('/sales', 'SalesController@index')->name('sales')->middleware('auth');
Route::get('/recommendation', 'ProductController@recommendation')->name('productrecs')->middleware('auth');
Route::get('/edit-admin/{id}', 'AdminController@edit')->name('update-admin')->middleware('auth');
Route::get('/edit-product/{id}', 'ProductController@edit')->name('update-product')->middleware('auth');
Route::get('/edit-store/{id}', 'StoreController@edit')->name('update-store')->middleware('auth');

Route::get('/products-users', 'ProductController@productuser')->name('products-users')->middleware('auth');

Route::get('/create-admin', 'AdminController@create')->name('create-admin')->middleware('auth');
Route::get('/create-store', 'StoreController@create')->name('create-store')->middleware('auth');
Route::get('/create-product', 'ProductController@create')->name('create-product')->middleware('auth');


Route::post('/storeadmin', 'AdminController@store')->name('storeadmin')->middleware('auth');
Route::post('/storestore', 'StoreController@store')->name('storestore')->middleware('auth');
Route::post('/storeprod', 'ProductController@store')->name('storeprod')->middleware('auth');
Route::post('/upadmin', 'AdminController@update')->name('upadmin')->middleware('auth');
Route::post('/upprod', 'ProductController@update')->name('upprod')->middleware('auth');
Route::post('/upstore', 'StoreController@update')->name('upstore')->middleware('auth');