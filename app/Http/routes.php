<?php
use App\User;

use Illuminate\Http\Request;
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
    Route::get('/product/edit/{id}', ['as' => 'product.edit', 'middleware' => 'auth', 'uses' => 'ProductController@edit']);
    Route::post('/product/delete/media', ['as' => 'product.delete.media.post', 'middleware' => 'auth', 'uses' => 'ProductController@delete_media']);
    Route::post('/product/edit/{id}', ['as' => 'product.edit.post', 'middleware' => 'auth', 'uses' => 'ProductController@update']);
	Route::get('/product', ['as' => 'product.show', 'middleware' => 'auth', 'uses' => 'ProductController@index']);
	Route::post("/product/delete", ['as' => 'product.delete.post', 'middleware' => 'auth', 'uses' => 'ProductController@multiple_delete']);

    Route::post("/product/publish", ['as' => 'product.publish.post', 'middleware' => 'auth', 'uses' => 'ProductController@multiple_publish']);
    Route::post("/product/unpublish", ['as' => 'product.unpublish.post', 'middleware' => 'auth', 'uses' => 'ProductController@multiple_unpublish']);

	//Category
	Route::get('/category/create', ['as' => 'category.create', 'middleware' => 'auth', 'uses' => 'CategoryController@create']);
	Route::post('/category/create', ['as' => 'category.create.post', 'middleware' => 'auth', 'uses' => 'CategoryController@store']);
    Route::get('/category/edit/{id}', ['as' => 'category.edit', 'middleware' => 'auth', 'uses' => 'CategoryController@edit']);
    Route::post('/category/edit/{id}', ['as' => 'category.edit.post', 'middleware' => 'auth', 'uses' => 'CategoryController@update']);
	Route::get('/category', ['as' => 'category.show', 'middleware' => 'auth', 'uses' => 'CategoryController@index']);
    Route::post("/category/delete", ['as' => 'category.delete.post', 'middleware' => 'auth', 'uses' => 'CategoryController@multiple_delete']);

    Route::post("/category/publish", ['as' => 'category.publish.post', 'middleware' => 'auth', 'uses' => 'CategoryController@multiple_publish']);
    Route::post("/category/unpublish", ['as' => 'category.unpublish.post', 'middleware' => 'auth', 'uses' => 'CategoryController@multiple_unpublish']);

	// News
	Route::get('/news/create', ['as' => 'news.create', 'middleware' => 'auth', 'uses' => 'NewsController@index']);
	Route::post('/news/create', ['as' => 'news.create.post', 'middleware' => 'auth', 'uses' => 'NewsController@store']);

	Route::get('/inventory', ['as' => 'inventory.show', 'middleware' => 'auth', 'uses' => 'InventoryController@index']);
    Route::get('/inventory/search', ['as' => 'inventory.search', 'middleware' => 'auth', 'uses' => 'InventoryController@index']);
    Route::get('/inventory/sort/{sorttype}', ['as' => 'inventory.sort', 'middleware' => 'auth', 'uses' => 'InventoryController@sort']);
    Route::post('/inventory/search', ['as' => 'inventory.search.post', 'middleware' => 'auth', 'uses' => 'InventoryController@search']);
    Route::post('/inventory/increase', ['as' => 'inventory.inc.post', 'middleware' => 'auth', 'uses' => 'InventoryController@increase']);
    Route::post('/inventory/decrease', ['as' => 'inventory.dec.post', 'middleware' => 'auth', 'uses' => 'InventoryController@decrease']);

    // Event
    Route::get('/event', ['as' => 'event', 'middleware' => 'auth', 'uses' => 'EventController@index']);
    Route::get('/event/create', ['as' => 'event.create', 'middleware' => 'auth', 'uses' => 'EventController@create']);
    Route::post('/event/create', ['as' => 'event.create.post', 'middleware' => 'auth', 'uses' => 'EventController@store']);
    Route::post("/event/delete", ['as' => 'event.delete.post', 'middleware' => 'auth', 'uses' => 'EventController@multiple_delete']);

    Route::get('/event/edit/{id}', ['as' => 'event.edit', 'middleware' => 'auth', 'uses' => 'EventController@edit']);
    Route::post('/event/edit/{id}', ['as' => 'event.edit.post', 'middleware' => 'auth', 'uses' => 'EventController@update']);

    Route::post("/event/publish", ['as' => 'event.publish.post', 'middleware' => 'auth', 'uses' => 'EventController@multiple_publish']);
    Route::post("/event/unpublish", ['as' => 'event.unpublish.post', 'middleware' => 'auth', 'uses' => 'EventController@multiple_unpublish']);

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