<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/create-post', "ProductController@createData");

Route::get('/getdata-product/{id}', "ProductController@getData");

Route::get('/getalldata', "ProductController@getAllData");

Route::get('/searchData', "ProductController@searchData");

Route::patch('/update-products/{id}', "ProductController@updateData");

Route::delete('/delete-products/{id}', "ProductController@deleteData");

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
