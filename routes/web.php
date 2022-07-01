<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\FormController;

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

// Route::get('form', 'FormController@create')->name('form.create');
Route::get('/', 'App\Http\Controllers\FormController@index');
Route::get('create', 'App\Http\Controllers\FormController@create')->name('create');
Route::post('store', 'App\Http\Controllers\FormController@store')->name('form.store');
Route::get('success', 'App\Http\Controllers\FormController@success')->name('success');
