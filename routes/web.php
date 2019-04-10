<?php

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

// main page route
Route::get('/', ['uses' => 'IndexController@index', 'as' => 'home']);

Route::get("/fighters/{alias?}",["uses"=>"FighterController@index","as"=>"fighters"]);
Route::get("/articles/{alias}", ["uses"=>"ArticleController@view", "as"=>"article"]);
Route::resource('/comment','CommentsController', ['only'=>['store']]);
Route::match(['get', 'post'],"/search", ["uses"=>"SearchController@index","as"=>"search"]);
Route::match(['get', 'post'],"/like", ["uses"=>"LikesController@index","as"=>"likes"]);

Route::get("/feedback", ["uses"=>"FeedbackController@index","as"=>"feedback"]);
Route::post("/feedback", ["uses"=>"FeedbackController@sendMail"]);

//auth
Route::group(['middleware' => 'auth'], function() {
	//user profile routes
	Route::match(['get', 'post'],"/cabinet", ["uses"=>"CabinetController@edit","as"=>"cabinet"]);

	/*Admin routes*/
	Route::group(['prefix'=>'admin', 'namespace'=>'Admin','middleware'=>'admin'], function() {
		Route::get('/','DashboardController@index')->name('admin.index');
		Route::resource('/articles','ArticleController', ['as'=>'admin']);
		Route::resource('/fighters','FightersController', ['as'=>'admin']);
		Route::resource('/users','UsersController', ['as'=>'admin']);
		// Route::get('/password/email','ForgotPasswordController@sendResetLinkEmail', ['as'=>'admin']);
	});
});

// Route::match(['get', 'post'],"/fighters_search", ["uses"=>"FightersSearchController@index","as"=>"f_search"]);



Auth::routes();

