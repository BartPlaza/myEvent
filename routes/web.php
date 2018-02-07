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
})->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/{user}/events', 'EventController@showAll')->name('myEvents');
Route::get('/event/{event}', 'EventController@show');
Route::put('/event/{event}/edit', 'EventController@update');
Route::post('/event/create', 'EventController@store');

