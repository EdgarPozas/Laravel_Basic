<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/',"HomeController@index");

Route::get('/products',"ProductController@all");
Route::get('/products/{id_product}',"ProductController@select");
Route::post('/products',"ProductController@create");
Route::post('/products/u/{id_product}',"ProductController@update");
Route::post('/products/d/{id_product}',"ProductController@delete");

Route::get('/users',"UserController@all");
Route::get('/users/{id_user}',"UserController@select");
Route::post('/users',"UserController@create");
Route::post('/users/u/{id_user}',"UserController@update");
Route::post('/users/d/{id_user}',"UserController@delete");
