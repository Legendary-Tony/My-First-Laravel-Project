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



//Admin Route
Route::group(['namespace' => 'Admin'], function(){
	Route::get('/admin/home', 'HomeController@home')->name('admin.home');

	//Posts Route
	Route::resource('admin/posts', 'PostController');

	//ROle Route
	Route::resource('admin/role', 'RoleController');

	//Permission Route
	Route::resource('admin/permission', 'PermissionController');

	//Users Route
	Route::resource('admin/users', 'UserController');

	//Tags Route
	Route::resource('admin/tags', 'TagController');

	//Categories Route
	Route::resource('admin/categories', 'CategoryController');

	//Admin Login
	Route::get('admin-login', 'Auth\LoginController@showLoginForm')->name('admin.login');
	Route::post('admin-login', 'Auth\LoginController@login');
});



//User Route
Route::group(['namespace' => 'User'], function(){
	Route::get('/', 'HomeController@index');

	//User Posts
	Route::get('/posts/{post?}', 'PostController@posts')->name('posts');

	Route::get('/posts/tag/{tag}', 'HomeController@tag')->name('tag');

	Route::get('posts/category/{category}', 'HomeController@category')->name('category');
});





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
