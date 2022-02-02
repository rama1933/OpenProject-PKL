<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/', 'Otentikasi\OtentikasiController@index')->name('masuk_form');
Route::post('masuk', 'Otentikasi\OtentikasiController@login')->name('masuk');

Route::get('daftar_form', 'Otentikasi\OtentikasiController@daftar')->name('daftar_form');
Route::post('daftar', 'Otentikasi\OtentikasiController@daftar_input')->name('daftar');
Route::any('periksa', 'Otentikasi\OtentikasiController@periksa')->name('periksa');

Route::group(['middleware' => 'auth'], function () {


    Route::get('dashboard', 'DashboardController@index')->name('dashboard');

    Route::get('pendaftaran_admin', 'AdminController@index')->name('pendaftaran_admin');
    Route::get('pendaftaran_admin_tambah', 'AdminController@index_tambah')->name('pendaftaran_admin_tambah');
    Route::get('pendaftaran_admin_edit/{id}', 'AdminController@index_edit')->name('pendaftaran_admin_edit');
    Route::any('pendaftaran_admin_store', 'AdminController@store')->name('pendaftaran_admin_store');
    Route::any('pendaftaran_admin_update', 'AdminController@update')->name('pendaftaran_admin_update');
    Route::get('pendaftaran_admin_hapus/{id}', 'AdminController@hapus')->name('pendaftaran_admin_hapus');
    Route::any('pendaftaran_admin_pdf', 'AdminController@pdf')->name('pendaftaran_admin_pdf');
    Route::any('pendaftaran_admin_pdf_detail/{id}', 'AdminController@pdf_detail')->name('pendaftaran_admin_pdf_detail');

    Route::get('pendaftaran', 'PendaftaranController@index')->name('pendaftaran');
    Route::get('pendaftaran_tambah', 'PendaftaranController@index_tambah')->name('pendaftaran_tambah');
    Route::get('pendaftaran_edit/{id}', 'PendaftaranController@index_edit')->name('pendaftaran_edit');
    Route::any('pendaftaran_store', 'PendaftaranController@store')->name('pendaftaran_store');
    Route::any('pendaftaran_update', 'PendaftaranController@update')->name('pendaftaran_update');
    Route::get('pendaftaran_hapus/{id}', 'PendaftaranController@hapus')->name('pendaftaran_hapus');
    Route::any('pendaftaran_pdf', 'PendaftaranController@pdf')->name('pendaftaran_pdf');
    Route::any('pendaftaran_pdf_detail/{id}', 'PendaftaranController@pdf_detail')->name('pendaftaran_pdf_detail');

    Route::get('jenis', 'JenisController@index')->name('jenis');
    Route::get('jenis_tambah', 'JenisController@index_tambah')->name('jenis_tambah');
    Route::get('jenis_edit/{id}', 'JenisController@index_edit')->name('jenis_edit');
    Route::any('jenis_store', 'JenisController@store')->name('jenis_store');
    Route::any('jenis_update', 'JenisController@update')->name('jenis_update');
    Route::get('jenis_hapus/{id}', 'JenisController@hapus')->name('jenis_hapus');
    Route::any('jenis_pdf', 'JenisController@pdf')->name('jenis_pdf');
    Route::any('jenis_pdf_detail/{id}', 'JenisController@pdf_detail')->name('jenis_pdf_detail');

    Route::get('type', 'typeController@index')->name('type');
    Route::get('type_tambah', 'typeController@index_tambah')->name('type_tambah');
    Route::get('type_edit/{id}', 'typeController@index_edit')->name('type_edit');
    Route::any('type_store', 'typeController@store')->name('type_store');
    Route::any('type_update', 'typeController@update')->name('type_update');
    Route::get('type_hapus/{id}', 'typeController@hapus')->name('type_hapus');
    Route::any('type_pdf', 'typeController@pdf')->name('type_pdf');
    Route::any('type_pdf_detail/{id}', 'typeController@pdf_detail')->name('type_pdf_detail');

    Route::get('merk', 'merkController@index')->name('merk');
    Route::get('merk_tambah', 'merkController@index_tambah')->name('merk_tambah');
    Route::get('merk_edit/{id}', 'merkController@index_edit')->name('merk_edit');
    Route::any('merk_store', 'merkController@store')->name('merk_store');
    Route::any('merk_update', 'merkController@update')->name('merk_update');
    Route::get('merk_hapus/{id}', 'merkController@hapus')->name('merk_hapus');
    Route::any('merk_pdf', 'merkController@pdf')->name('merk_pdf');
    Route::any('merk_pdf_detail/{id}', 'merkController@pdf_detail')->name('merk_pdf_detail');

     Route::get('biodata', 'biodataController@index')->name('biodata');
    Route::get('biodata_user', 'biodataController@index_user')->name('biodata_user');
    Route::get('biodata_tambah', 'biodataController@index_tambah')->name('biodata_tambah');
    Route::get('biodata_edit/{id}', 'biodataController@index_edit')->name('biodata_edit');
        Route::get('biodata_edit_user/{id}', 'biodataController@index_edit_user')->name('biodata_edit_user');
    Route::any('biodata_store', 'biodataController@store')->name('biodata_store');
    Route::any('biodata_update', 'biodataController@update')->name('biodata_update');
        Route::any('biodata_update_user', 'biodataController@update_user')->name('biodata_update_user');
    Route::get('biodata_hapus/{id}', 'biodataController@hapus')->name('biodata_hapus');
    Route::any('biodata_pdf', 'biodataController@pdf')->name('biodata_pdf');
    Route::any('biodata_pdf_detail/{id}', 'biodataController@pdf_detail')->name('biodata_pdf_detail');


    Route::get('user', 'user\UserController@index')->name('user');
    Route::get('user_tambah', 'user\UserController@index_tambah')->name('user_tambah');
    Route::get('user_edit/{id}', 'user\UserController@index_edit')->name('user_edit');
    Route::any('user_store', 'user\UserController@store')->name('user_store');
    Route::any('user_update', 'user\UserController@update')->name('user_update');
    Route::get('user_hapus/{id}', 'user\UserController@hapus')->name('user_hapus');


    Route::get('logout', 'otentikasi\OtentikasiController@logout')->name('logout');
});
