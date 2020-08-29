<?php

use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Auth::routes();

Route::resource('/observations', 'ObservationsController');
Route::get('/observations/{observations}/destroy', 'ObservationsController@destroy');
Route::get('/observations/{id}/fetch_image', 'ObservationsController@fetch_image');

Route::resource('/users','UserController');
Route::get('/users/{user}/delete',['as'=>'users.delete','uses'=>'UserController@delete']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
