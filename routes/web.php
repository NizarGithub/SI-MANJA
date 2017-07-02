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



Route::get('login', 'Auth\LoginController@showLoginForm');
Route::post('login', 'Auth\LoginController@login');
Route::get('change_password', 'UserController@changePassword');
Route::post('change_password', 'UserController@changePasswordProcess');
Route::get('logout', 'Auth\LoginController@logout');


Route::get('user', 'UserController@index');
Route::get('user/create', 'UserController@create');
Route::post('user/create', 'UserController@store');
Route::post('user/edit/{id}', 'UserController@update');
Route::get('user/detail/{id}', 'UserController@detail');
Route::get('user/edit/{id}', 'UserController@edit');
Route::get('user/delete/{id}', 'UserController@delete');


Route::get('kecamatan', 'KecamatanController@index');
Route::get('kecamatan/delete/{code}', 'KecamatanController@delete');
Route::post('kecamatan', 'KecamatanController@process');


Route::get('kegiatan/create', 'KegiatanController@create');
Route::post('kegiatan/create', 'KegiatanController@store');
Route::get('kegiatan/kecamatan/{kecamatanCode}', 'KegiatanController@byKecamatan');
Route::get('kegiatan/{id}', 'KegiatanController@detail');


Route::get('kegiatan/laporan/create/{kegiatanId}', 'LaporanController@create');
Route::post('kegiatan/laporan/create/{kegiatanId}', 'LaporanController@store');
Route::get('kegiatan/laporan/received/{kegiatanId}', 'LaporanController@received');