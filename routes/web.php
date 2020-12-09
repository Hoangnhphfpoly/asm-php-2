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

Route::get('/','AuthController@index')->name('auth-index');

Route::post('/sign-in','AuthController@signIn')->name('sign-in');

Route::get('/log-out','AuthController@logOut')->name('log-out');

Route::get('/dashboard','DashboardController@index')->name('dashboard');

Route::get('/err', function (){
    return view('403');
})->name('err');
//->middleware('check-edit')
Route::group(['prefix'=>'user'], function (){
    Route::get('/', 'UserController@index')->name('user-index');
    Route::get('/insertForm','UserController@insertForm')->name('user-insertForm');
    Route::post('/saveInsert','UserController@saveInsert')->name('user-saveInsert');
    Route::get('/delete-user/{id}','UserController@delete')->name('user-delete');
    Route::get('/editForm/{id}','UserController@editForm')->name('user-editForm');
    Route::post('/saveEdit','UserController@saveEdit')->name('user-saveEdit');
});

Route::group(['prefix'=>'category'], function(){
    Route::get('/', 'CategoryController@index')->name('cate-index');
    Route::get('/insertForm','CategoryController@insertForm')->name('cate-insertForm');
    Route::post('/saveInsert','CategoryController@saveInsert')->name('cate-saveInsert');
    Route::get('/delete/{id}','CategoryController@delete')->name('cate-delete');
    Route::get('/editForm/{id}','CategoryController@editForm')->name('cate-editForm');
    Route::post('/saveEdit','CategoryController@saveEdit')->name('cate-saveEdit');
});


Route::group(['prefix'=>'product'], function(){
    Route::get('/','ProductCOntroller@index')->name('prod-index');
    Route::get('/insertForm','ProductController@insertForm')->name('prod-insertForm');
    Route::post('/saveInsert','ProductController@saveInsert')->name('prod-saveInsert');
    Route::get('/delete/{id}','ProductController@delete')->name('prod-delete');
    Route::get('/editForm/{id}','ProductController@editForm')->name('prod-editForm');
    Route::post('/saveEdit','ProductController@saveEdit')->name('prod-saveEdit');
    Route::get('/detail/{id}', 'ProductController@detail')->name('prod-detail');
});

Route::group(['prefix'=>'invoice'], function (){
    Route::get('/', 'InvoiceController@index')->name('invoice-index');
    Route::get('/delete/{id}','InvoiceController@delete')->name('invoice-delete');
    Route::get('/insertForm','InvoiceController@insertForm')->name('invoice-insertForm');
    Route::post('/saveInsert','InvoiceController@saveInsert')->name('invoice-saveInsert');
    Route::get('/editForm/{id}','InvoiceController@editForm')->name('invoice-editForm');
    Route::post('/saveEdit','InvoiceController@saveEdit')->name('invoice-saveEdit');
});
