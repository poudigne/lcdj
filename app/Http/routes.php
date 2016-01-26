<?php
use App\User;
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



Route::get('/', ['as' => 'public.index', 'uses' => function () {
    return view('accueil');
}]);
Route::get('/Jeux', ['as' => 'public.games', 'uses' => function () {
    return view('jeux');
}]);
Route::get('/Contact', ['as' => 'public.contact', 'uses' => function () {
    return view('contact');
}]);
Route::get('/Cartes', ['as' => 'public.cards', 'uses' => function () {
    return view('cartes');
}]);
Route::get('/Evenement', ['as' => 'public.events', 'uses' => function () {
    return view('events');
}]);



// DASHBOARD 
Route::group(['middleware' => 'auth', 'prefix' => 'dashboard'], function () {
    //Route::get('/', 'HomeController@index');
	Route::get('/home', ['as'=>'dashboard.home', 'uses' => 'HomeController@index']);
	Route::get('/home/{id}', ['as'=>'dashboard.product', 'uses' => 'HomeController@show']);

	//Dashboard
	Route::get('/Dashboard', ['as' => 'dashboard', 'middleware' => 'auth', 'uses' => 'DashboardController@index']);

	//Product
	Route::get('/product/view/{id}', ['middleware' => 'auth', 'uses' => 'ProductController@show']);
	Route::get('/CreateProduct', ['as' => 'dashboard.create_product', 'middleware' => 'auth', 'uses' => 'ProductController@create']);
	Route::post('/CreateProduct', ['as' => 'dashboard.create_product.post', 'middleware' => 'auth', 'uses' => 'ProductController@store']);
	Route::get('/Products', ['as' => 'dashboard.show_product', 'middleware' => 'auth', 'uses' => 'ProductController@index']);
	Route::get("/Products/delete/{id}", ['middleware' => 'auth', 'uses' => 'ProductController@destroy']);

	//Category
	Route::get('/CreateCategory', ['as' => 'dashboard.create_category', 'middleware' => 'auth', 'uses' => 'CategoryController@create']);
	Route::post('/CreateCategory', ['as' => 'dashboard.create_category.post', 'middleware' => 'auth', 'uses' => 'CategoryController@store']);
	Route::get('/Categories', ['as' => 'dashboard.show_categories', 'middleware' => 'auth', 'uses' => 'CategoryController@index']);
	Route::get("/Categories/delete/{id}", ['middleware' => 'auth', 'uses' => 'CategoryController@destroy']);

	Route::get("/CreateShenrokCredential", function(){
	    return User::create([
	           'name' => 'Marc cantin',
	           'email' => 'shenrok@lcdj.com',
	           'password' => bcrypt('test123'),
	       ]);
	});
});





//login 
Route::get('/auth/login','Auth\AuthController@getLogin');
Route::post('/auth/login','Auth\AuthController@postLogin');

//register
// Route::get('/auth/register', 'Auth\AuthController@getRegister');
// Route::post('/auth/register', 'Auth\AuthController@postRegister');