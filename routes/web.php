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

Route::get('/', 'SiteController@home');
Route::get('/register', 'SiteController@register');
Route::post('/postregister', 'SiteController@postregister');
Route::get('/about', 'SiteController@about');
Route::get('/login', 'AuthController@login')->name('login');
Route::post('/postlogin', 'AuthController@postlogin');
Route::get('/logout', 'AuthController@logout');

Route::group(['middleware' => ['auth','checkRole:admin']], function(){
	Route::get('/siswa', 'SiswaController@index');
	Route::post('/siswa/create', 'SiswaController@create');
	Route::get('/siswa/{id}/edit', 'SiswaController@edit');
	Route::post('/siswa/{id}/update', 'SiswaController@update');
	Route::get('/siswa/{id}/delete', 'SiswaController@delete');
	Route::get('/siswa/{id}/profile', 'SiswaController@profile');
	Route::post('/siswa/{id}/addnilai', 'SiswaController@addnilai');
	Route::get('/siswa/{id}/{id_mapel}/editnilai', 'SiswaController@editnilai');
	Route::post('/siswa/{id}/{id_mapel}/updatenilai', 'SiswaController@updatenilai');
	Route::get('/siswa/{id}/{id_mapel}/deletenilai', 'SiswaController@deletenilai');
	Route::get('/siswa/export_excel', 'SiswaController@export_excel');
	Route::get('/siswa/export_pdf', 'SiswaController@export_pdf');
	Route::post('/siswa/import', 'SiswaController@importexcel')->name('siswa.import');
	Route::get('/guru/{id}/profile', 'GuruController@profile');
	Route::get('/posts', 'PostController@index')->name('posts.index');
	//Route::post('/posts/create', 'PostController@create');
	Route::get('post/add', [
		'uses' => 'PostController@add',
		'as' => 'posts.add',
	]);
	Route::post('post/create', [
		'uses' => 'PostController@create',
		'as' => 'posts.create'
	]);
});

Route::group(['middleware' => ['auth', 'checkRole:siswa']], function(){
	Route::get('profilsaya', 'SiswaController@profilsaya');
});

Route::group(['middleware' => ['auth','checkRole:admin,siswa']], function(){
	Route::get('/dashboard', 'DashboardController@index');
	Route::get('/dashboard/viewtopfive', 'DashboardController@viewtopfive');
});


Route::get('/{slug}', [
	'uses' => 'PostController@singlepost',
	'as' => 'site.single.post'
]);