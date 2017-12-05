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

Route::get('category', 'CategoryController@index');

Route::group([
    'prefix' => 'product'
], function (){
    Route::get('/list/{categoryId}', 'ProductListController@index');
    Route::get('/info/{productId}', 'ProductInfoController@index');
});