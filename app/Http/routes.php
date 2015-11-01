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
Route::get('/Dashboard', 'DashboardController@index');

//Product
Route::get('/product/view/{id}', 'ProductController@show');
Route::get('/CreateProduct', 'ProductController@create');
Route::post('/CreateProduct', 'ProductController@store');
Route::get('/Products', 'ProductController@index');
Route::get("/Products/delete/{id}", 'ProductController@destroy');

//Category
Route::get('/CreateCategory', 'CategoryController@create');
Route::post('/CreateCategory', 'CategoryController@store');
Route::get('/Categories', 'CategoryController@index');
Route::get("/Categories/delete/{id}", 'CategoryController@destroy');

//login 
Route::get('/login','Auth\AuthController@getLogin');
Route::post('/login','Auth\AuthController@postLogin');