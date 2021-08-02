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


Route::get('login', 'App\Http\Controllers\PagesController@login')->name('login');
Route::post('authenticate','App\Http\Controllers\PagesController@authenticate')->name('authenticate');

Route::get('register', 'App\Http\Controllers\PagesController@register');
Route::post('register','App\Http\Controllers\PagesController@process_register')->name('register');

Route::get('dashboard', 'App\Http\Controllers\PagesController@dashboard')
->name('dashboard')->middleware('auth');


Route::get('sent', 'App\Http\Controllers\PagesController@sent')
->name('sent')->middleware('auth');

Route::get('compose', 'App\Http\Controllers\PagesController@compose')->middleware('auth');
Route::post('sendMessage','App\Http\Controllers\PagesController@sendMessage')->name('sendMessage')
->middleware('auth');

Route::get('logout','App\Http\Controllers\PagesController@logout')->name('logout');
