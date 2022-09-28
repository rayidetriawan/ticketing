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
    Route::group(['middleware' => 'can:isAdmin'], function (){
        Route::get('crud','TestController@index')->name('crudindex');
        Route::get('crud/tambah','TestController@tambah')->name('tambah');
        Route::get('crud/caribarang','TestController@cari')->name('caribarang');
        Route::post('crud/simpan','TestController@simpan')->name('simpan');
        Route::delete('crud/delete/{id}','TestController@hapus')->name('hapus');
        Route::get('crud/{id}/edit','TestController@edit')->name('edit');
        Route::post('crud','TestController@update')->name('update');  
        
        Route::get('kondisi','KondisiController@index')->name('kondisi');  
        Route::post('kondisi/simpan','KondisiController@simpan')->name('simpan.kondisi');
        Route::get('kondisi/{id}/edit','KondisiController@edit')->name('edit.kondisi');
        Route::post('kondisi/update','KondisiController@update')->name('update.kondisi');  
        Route::delete('kondisi/delete/{id}','KondisiController@hapus')->name('hapus.kondisi');

        Route::get('kategori','KategoriController@index')->name('kategori');  
        Route::post('kategori/simpan','KategoriController@simpan')->name('simpan.kategori');
        Route::get('kategori/{id}/edit','KategoriController@edit')->name('edit.kategori');
        Route::post('kategori/update','KategoriController@update')->name('update.kategori');  
        Route::delete('kategori/delete/{id}','KategoriController@hapus')->name('hapus.kategori');

        Route::get('subkategori','SubKategoriController@index')->name('subkategori');
        Route::post('subkategori/simpan','SubKategoriController@simpan')->name('simpan.subkategori');
        Route::get('subkategori/{id}/edit','SubKategoriController@edit')->name('edit.subkategori');
        Route::post('subkategori/update','SubKategoriController@update')->name('update.subkategori');  
        Route::delete('subkategori/delete/{id}','SubKategoriController@hapus')->name('hapus.subkategori'); 
        
    });


    Route::get('logout','AuthController@logout')->name('logout');
});

Route::get('send-mail', function () {
   
    $details = [
        'title' => 'Mail from ItSolutionStuff.com',
        'body' => 'This is for testing email using smtp'
    ];
   
    \Mail::to('rayidetriawan@gmail.com')->send(new \App\Mail\MyTestMail($details));
   
    dd("Email is Sent.");
});

Route::get('/home', 'HomeController@index')->name('home');
