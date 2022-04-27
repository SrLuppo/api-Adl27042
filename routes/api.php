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

/**
 * Declare the main resource controller
 */
Route::apiResource('/products', 'ProductsController');

/**
 * Declare the main endpoint to get all the history
 */
Route::get('/history', 'HistoryController@index');