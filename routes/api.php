<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// namespace App\Http\Controllers\api\postApicontroller;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::get('posts','PostControllerapi@index');
Route::get('posts/{id}','PostControllerapi@show');
Route::post('posts','PostControllerapi@store');