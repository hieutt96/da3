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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('dang-ky',['as'=>'dang-ky','uses'=>'User\RegisterController@getRegister']);
Route::post('dang-ky',['as'=>'dang-ky.post','uses'=>'User\RegisterController@postRegister']);
//Xác nhận tài khoản Email
Route::get('confirm/{token}',['as'=>'register_confirm','uses'=>'User\RegisterController@confirmRegister']);
	// đăng nhập
Route::get('dang-nhap', ['as'=>'dang-nhap', 'uses'=>'User\LoginController@getLogin']);
Route::post('dang-nhap', ['as'=>'dang-nhap.post', 'uses'=>'User\LoginController@postLogin']);

	//đăng xuất
Route::get('dang-xuat', ['as'=>'dang-xuat', 'uses'=>'User\LoginController@logout']);
