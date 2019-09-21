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


Auth::routes();


Route::get('/','LoginController@vlogin')->name('sign');
Route::post('/','LoginController@login');


Route::middleware('admin')->group(function () {
    // klinik
    Route::get('panel/klinik','PoliklinikController@index')->name('klinik');
    Route::post('panel/klinik','PoliklinikController@store');
    Route::get('panel/klinik/{id}/edit','PoliklinikController@edit')->name('ed-klinik');
    Route::post('panel/klinik/{id}/edit','PoliklinikController@update');
    Route::delete('panel/klinik/{id}/delete','PoliklinikController@destroy')->name('del-klinik');
    // dokter
    Route::get('panel/dokter','DokterController@index')->name('dokter');
    Route::post('panel/dokter','DokterController@store');
    Route::get('panel/dokter/{id}/edit','DokterController@edit')->name('ed-dokter');
    Route::post('panel/dokter/{id}/edit','DokterController@update');
    Route::delete('panel/dokter/{id}/delete','DokterController@destroy')->name('del-dokter');
    // Pasien
    Route::get('panel/pasien','PasienController@index')->name('pasien');
    Route::post('panel/pasien','PasienController@store');
    Route::get('panel/pasien/{id}/edit','PasienController@edit')->name('ed-pasien');
    Route::post('panel/pasien/{id}/edit','PasienController@update');
    Route::get('panel/pasien/{id}/delete','PasienController@destroy')->name('del-pasien');
});

Route::middleware('auth')->group(function () {
    Route::get('klinik/users','DokterController@users')->name('users');
});