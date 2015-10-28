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

//Product
Route::get('/CreateProduct', 'ProductController@index');
Route::post('/CreateProduct', 'ProductController@store');

//Category
Route::get('/CreateCategory', 'CategoryController@index');
Route::post('/CreateCategory', 'CategoryController@store');

//login 
Route::get('/login','Auth\AuthController@getLogin');
Route::post('/login','Auth\AuthController@postLogin');