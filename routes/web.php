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

Route::get('/', 'HomeController@index');
// Route::get('/', 'PostController@index');



Route::get('/search','PostController@search');
Route::get('/crud','CrudController@create')->name('ajax');
Route::get('/post', 'PostController@index')->name('post');
Route::resource('posts','PostController');
Route::resource('cruds','CrudController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/verfication/{token}','Auth\RegisterController@verification');

Route::get('/file','FileController@index')->name('viewfile');

Route::get('/file/upload','FileController@create')->name('formfile');
Route::post('/file/upload','FileController@store')->name('uploadfile');


Route::delete('/file/{id}','FileController@destroy')->name('deletefile');
Route::get('/file/download/{id}','FileController@show')->name('downloadfile');

Route::get('/file/email/{id}','FileController@edit')->name('emailfile');


Route::get('/file/dropzone','FileController@create')	;
Route::post('/file/dropzone','FileController@dropzone')->name('dropzone');



Route::get('/login/facebook','Auth\LoginController@redirectToFacebook')->name('fblogin');
Route::get('/login/facebook/callback','Auth\LoginController@handleFacebookCallback')->name('fbcallback');