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

Route::get('/', 'HomeController@index')->name('home');

// Dish routes
// sukuria 7 routus, kuriuos galime panaudoti kuriant CRUD'a
Route::resource('dishes', 'DishController');










Auth::routes();
