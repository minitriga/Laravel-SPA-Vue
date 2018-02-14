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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::group([

//     'middleware' => 'api',
//     // 'namespace' => 'App\Http\Controllers',
//     'prefix' => 'auth'

// ], function () {

//     Route::post('/register', 'Auth\AuthController@register');
//     // Route::post('logout', 'AuthController@logout');
//     // Route::post('refresh', 'AuthController@refresh');
//     // Route::post('me', 'AuthController@me');

// });
Route::post('/register', 'Auth\AuthController@register');
Route::post('/login', 'Auth\AuthController@login');
Route::post('/logout', 'Auth\AuthController@logout');

//protect
Route::group(['middleware' => 'jwt.auth'], function() {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::get('/timeline', 'TimelineController@index');
});
