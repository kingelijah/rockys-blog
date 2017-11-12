<?php



Route::group(['namespace' => 'user'], function(){

Route::get('/', 'homecontroller@index')->name('posts');
Route::get('contactus', 'homecontroller@contact')->name('contact');

Route::get('post/{slug}', 'postcontroller@post')->name('post');
Route::get('post/category/{category}', 'homecontroller@category')->name('category');
});




Route::group(['namespace' => 'admin' ], function(){

Route::get('admin/home', 'homecontroller@create')->name('admin.home');
Route::resource('admin/user', 'usercontroller');
Route::resource('admin/category', 'categorycontroller');
Route::resource('admin/role', 'rolecontroller');
Route::resource('admin/permission', 'permissioncontroller');
Route::resource('admin/post', 'postcontroller');
Route::get('admin-login', 'Auth\logincontroller@showloginform')->name('admin.login');
Route::post('admin-login', 'Auth\logincontroller@login')->name('admin.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
