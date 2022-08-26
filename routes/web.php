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
Auth::routes();

// Route::get('/', function ()
// {
//     return view('welcome');
// });

// Route::get('/','AuthController@index')->name('login');
// Route::post('/login','AuthController@login')->name('login');
Route::get('/','Auth\LoginController@showLoginForm')->name('login');
Route::post('/','Auth\LoginController@login')->name('login');

// // Route::group(['middleware' => 'CekloginMiddleware'], function (){
Route::group(['middleware' => 'auth'], function (){
    Route::get('/dashboard', function () { return view('index');})->name('/home');
    Route::get('crud','TestController@index')->name('crudindex');
    Route::get('crud/tambah','TestController@tambah')->name('tambah');
    Route::post('crud/simpan','TestController@simpan')->name('simpan');
    Route::delete('crud/delete/{id}','TestController@hapus')->name('hapus');
    Route::get('crud/{id}/edit','TestController@edit')->name('edit');
    Route::patch('crud/{id}','TestController@update')->name('update');    
    Route::get('logout','AuthController@logout')->name('logout');
});

Route::get('/home', 'HomeController@index')->name('home');
