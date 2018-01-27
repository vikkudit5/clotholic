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

Route::get('/', function () {
    return view('welcome');
});


// Route::get ( '/', function () {
// 	return view ( 'admin.adminLogin' );
// } );

Route::get('/mainAdmin','AuthController@show');
Route::post ('/customLogin', 'AuthController@customLogin');
// Route::post ('/register', 'AuthController@register' );



// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth']], function () { 
	Route::get('/admin','AdminController@index');
	Route::resource('/category','CategoryController');
	Route::get ( '/logout', 'AuthController@logout' );

});