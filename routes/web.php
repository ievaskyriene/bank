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

Route::get('create/database', 'DataBaseController2@create');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'accounts'], function(){
    Route::get('', 'AccountController@index')->name('account.index');
    Route::get('create', 'AccountController@create')->name('account.create');
    Route::post('store', 'AccountController@store')->name('account.store');
    
    Route::get('add/{account}', 'AccountController@add')->name('account.add');
    Route::get('minus/{account}', 'AccountController@minus')->name('account.minus');
 

    Route::post('update/{account}', 'AccountController@update')->name('account.update');

    Route::post('updateAdd/{account}', 'AccountController@updateAdd')->name('account.updateAdd');
    Route::post('updateMinus/{account}', 'AccountController@updateMinus')->name('account.updateMinus');

    Route::post('delete/{account}', 'AccountController@destroy')->name('account.destroy');
    Route::get('show/{account}', 'AccountController@show')->name('account.show');
 });
 
