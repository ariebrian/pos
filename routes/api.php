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
Route::post('/login', 'api\ApiController@loginStore');

Route::group(['middleware' => 'apiauth'], function () {
    Route::get('/productsauth', 'api\ApiController@getProduct');
    Route::get('/yourprod', 'api\ApiController@getProductUser');
    Route::get('/yoursales', 'api\ApiController@getSales');
    
    Route::post('/postprod', 'api\ApiController@postProductUser');
    Route::post('/postsale', 'api\ApiController@postSales');

});

Route::get('/products', 'api\ApiController@getProduct');