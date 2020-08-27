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
    return view('login.index');
});
Route::group(['middleware'=>'auth'],function (){
    Route::get('/task', 'TaskController@index')->name('task');
    Route::post('/add/task', 'TaskController@store')->name('task.store');
    Route::get('/edit/task/{id}', 'TaskController@edit')->name('task.edit');
    Route::post('/update/task', 'TaskController@update')->name('task.update');
    Route::post('/delete/task', 'TaskController@destroy')->name('task.delete');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
