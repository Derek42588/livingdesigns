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

Route::get('/', 'LandingController@show');
Route::get('/blog/create', 'PostController@create')->middleware('auth');
Route::post('/blog/', 'PostController@store')->middleware('auth');
Route::get('/blog', 'PostController@index')->name('blog.index');
Route::get('/blog/{post}', 'PostController@show')->name('blog.show');
Route::get('/blog/{post}/edit', 'PostController@edit')->middleware('auth');
Route::put('/blog/{post}', 'PostController@update')->middleware('auth');
Route::delete('/blog/{post}', 'PostController@destroy')->middleware('auth');
Route::post('/', 'LandingController@sendMail');
