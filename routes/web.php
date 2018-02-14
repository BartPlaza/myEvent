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

Route::get('/dashboard', 'HomeController@index')->name('dashboard');
Route::get('/events/create', 'DashboardController@newEvent')->name('newEvent');
Route::get('/{user}/events', 'DashboardController@events')->name('myEvents');

Route::post('/event/create', 'EventController@store');
Route::get('/event/{event}', 'EventController@show');
Route::put('/event/{event}/edit', 'EventController@update');
Route::delete('/event/{event}/delete', 'EventController@delete');


