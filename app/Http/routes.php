<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

//home 
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::get('/home/{id}', 'HomeController@show');

//Dashboard
Route::get('/Dashboard', ['middleware' => 'auth', 'uses' => 'DashboardController@index']);

//Product
Route::get('/product/view/{id}', ['middleware' => 'auth', 'uses' => 'ProductController@show']);
Route::get('/CreateProduct', ['middleware' => 'auth', 'uses' => 'ProductController@create']);
Route::post('/CreateProduct', ['middleware' => 'auth', 'uses' => 'ProductController@store']);
Route::get('/Products', ['middleware' => 'auth', 'uses' => 'ProductController@index']);
Route::get("/Products/delete/{id}", ['middleware' => 'auth', 'uses' => 'ProductController@destroy']);

//Category
Route::get('/CreateCategory', ['middleware' => 'auth', 'uses' => 'CategoryController@create']);
Route::post('/CreateCategory', ['middleware' => 'auth', 'uses' => 'CategoryController@store']);
Route::get('/Categories', ['middleware' => 'auth', 'uses' => 'CategoryController@index']);
Route::get("/Categories/delete/{id}", ['middleware' => 'auth', 'uses' => 'CategoryController@destroy']);

//login 
Route::get('/login','Auth\AuthController@getLogin');
Route::post('/login','Auth\AuthController@postLogin');