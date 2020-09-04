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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:api')->get('/token', function (Request $request) {
    //return $request->user();
    $token = $request->user()->createToken('token-name');
    return $token->plainTextToken;
});
Route::middleware('auth:sanctum')->get('/sanctum/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', 'LoginController@login');
Route::post('/logout', 'LoginController@logout');

Route::apiResource('photos', 'API\PhotoController');