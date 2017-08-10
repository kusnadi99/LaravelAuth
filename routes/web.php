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

Route::get('/', 'HomeController@Home');

//register merupakan file aksesnya
//RegisterController nama controller register
//@getRegister dengan memanggil fungsi getRegister untuk menampilkan view
Route::get('register', 'RegisterController@getRegister');
Route::post('postRegister', 'RegisterController@postRegister');


//jika error 'Route [login] not defined'.
//gunakan fungsi seperti di bawh ini untuk menangani middleware
Route::get('login', ['as' => 'login', 'uses' => 'LoginController@getLogin']);
//membuat route untuk post login
Route::post('postLogin', 'LoginController@postLogin');
//membuat route untuk logout
Route::get('logout', function() {
	Auth::logout();
	return redirect('/login');
});

//membuar route khusus halaman berdasarkan role
Route::get('getout', function() {
	return view('getout');
});


Route::get('delete', 'AdminController@delete');
Route::get('update', 'AdminController@update');


