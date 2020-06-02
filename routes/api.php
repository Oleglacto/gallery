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

/**
 * Роуты для тестирования
 */
if (env('APP_ENV') === 'testing') {
    Route::group(['prefix' => 'tests', 'as' => 'tests.'], function() {
        Route::post('strict-request', 'TestingController@strictRequest')->name('strict-request');
    });
}

