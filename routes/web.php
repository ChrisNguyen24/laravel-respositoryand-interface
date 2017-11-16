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

Route::resource('task','TaskController');
Route::get('downloadPDF/{id}','TaskController@downloadPDF')->name('pdf');
Route::get('importExport', 'TaskController@importExport');
Route::get('downloadExcel/{type}', 'TaskController@downloadExcel');
Route::post('importExcel', 'TaskController@importExcel');
Route::get('sendmail','TaskController@sendmail')->name('sendmail');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
