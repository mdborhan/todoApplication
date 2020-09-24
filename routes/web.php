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

Route::get('/', function () {
    return view('home.index');
});


    Route::get('/dashboard', 'TaskController@index')->name('dash');
    Route::get('/create/category', 'TaskController@getCategory')->name('create.category');
    Route::post('/add/category', 'TaskController@addCategory')->name('add.category');
    Route::post('/delete/category', 'TaskController@deleteCategory')->name('delete.category');

    Route::get('/create/products', 'TaskController@getProducts')->name('create.products');
    Route::post('/add/products', 'TaskController@addProducts')->name('add.product');

    Route::get('/create/customer', 'TaskController@getCustomer')->name('create.customer');
    Route::post('/add/customer', 'TaskController@addCustomer')->name('add.customer');

    Route::get('/create/proposal/page', 'TaskController@getProposal')->name('create.proposal');
    Route::get('/create/proposal', 'TaskController@postProposal');
    Route::post('/store/proposal', 'TaskController@store')->name('store');





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
