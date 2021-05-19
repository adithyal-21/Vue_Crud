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
Route::post('data','TestingController@store');
Route::post('data/login','TestingController@login');
Route::get('books','TestingController@index');
Route::get('book/edit/{id}','TestingController@edit');
Route::post('book/update/{id}','TestingController@update');
Route::delete('book/delete/{id}','TestingController@destroy');
Route::get('book/logout',function(){
    Session::forget('name');
});