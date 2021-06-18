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
    return redirect()->route('login');
});

Auth::routes(['verify'=>true]);

Route::group(['middleware' => ['auth'], 'namespace' => '\App\Http\Controllers'], function () {
    Route::get('urls', 'UrlController@index')->name('urls.index');
    Route::get('urls/create', 'UrlController@create')->name('urls.create');
    Route::post('urls', 'UrlController@store')->name('urls.store');
});

Route::get('/{shortCode}', 'UrlController@findLongUrl')->name('urls.findLongUrl');