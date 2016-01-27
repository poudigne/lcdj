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
Route::group(['as' => 'dashboard::','middleware' => 'auth', 'prefix' => 'dashboard'], function () {
    Route::get('/', ['middleware' => 'auth', 'uses' => 'DashboardController@index']);
	Route::get('/home', ['as'=>'home', 'uses' => 'DashboardController@index']);

	//Product
	Route::get('/product/view/{id}', ['middleware' => 'auth', 'uses' => 'ProductController@show']);
	Route::get('/product/create', ['as' => 'product.create', 'middleware' => 'auth', 'uses' => 'ProductController@create']);
	Route::post('/product/create', ['as' => 'product.create.post', 'middleware' => 'auth', 'uses' => 'ProductController@store']);
	Route::get('/product', ['as' => 'product.show', 'middleware' => 'auth', 'uses' => 'ProductController@index']);
	Route::get("/product/delete/{id}", ['as' => 'product.delete', 'middleware' => 'auth', 'uses' => 'ProductController@destroy']);

	//Category
	Route::get('/category/create', ['as' => 'category.create', 'middleware' => 'auth', 'uses' => 'CategoryController@create']);
	Route::post('/category/create', ['as' => 'category.create.post', 'middleware' => 'auth', 'uses' => 'CategoryController@store']);
	Route::get('/category', ['as' => 'category.show', 'middleware' => 'auth', 'uses' => 'CategoryController@index']);
	Route::get("/category/delete/{id}", ['as' => 'category.delete', 'middleware' => 'auth', 'uses' => 'CategoryController@destroy']);

	// News
	Route::get('/news/create', ['as' => 'news.create', 'middleware' => 'auth', 'uses' => 'NewsController@index']);
	Route::post('/news/create', ['as' => 'news.create.post', 'middleware' => 'auth', 'uses' => 'NewsController@store']);
});

Route::get("/CreateShenrokCredential", function(){
    return User::create([
           'name' => 'Marc cantin',
           'email' => 'shenrok@lcdj.com',
           'password' => bcrypt('test123'),
       ]);
});



//login 
Route::get('/auth/login','Auth\AuthController@getLogin');
Route::post('/auth/login','Auth\AuthController@postLogin');

Route::get('/auth/logout',  ['as' => 'logout',     'uses' => function(){ if (Auth::check()) { Auth::logout(); return redirect()->route('dashboard::home'); }  }]);

//register
// Route::get('/auth/register', 'Auth\AuthController@getRegister');
// Route::post('/auth/register', 'Auth\AuthController@postRegister');