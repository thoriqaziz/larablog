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
    return view('welcome');
});

Route::get('/categories', [
    'uses' => 'CategoryController@index',
    'as' => 'categories'
]);

Route::get('/category/create', [
    'uses' => 'CategoryController@create',
    'as' => 'category.create'
]);

Route::post('/category/store', [
    'uses' => 'CategoryController@store',
    'as' => 'category.store'
]);



Route::get('/posts', [
    'uses' => 'PostController@index',
    'as' => 'posts'
]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
