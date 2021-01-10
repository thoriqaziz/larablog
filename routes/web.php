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

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {

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

Route::get('/category/edit/{id}', [
    'uses' => 'CategoryController@edit',
    'as' => 'category.edit'
]);

Route::post('/category/update/{id}', [
    'uses' => 'CategoryController@update',
    'as' => 'category.update'
]);

Route::get('/category/delete/{id}', [
    'uses' => 'CategoryController@delete',
    'as' => 'category.delete'
]);





Route::get('/posts', [
    'uses' => 'PostController@index',
    'as' => 'posts'
]);

Route::get('/post/create', [
    'uses' => 'PostController@create',
    'as' => 'post.create'
]);

Route::post('/post/store', [
    'uses' => 'PostController@store',
    'as' => 'post.store'
]);

Route::get('/post/edit/{id}', [
    'uses' => 'PostController@edit',
    'as' => 'post.edit'
]);

Route::post('/post/update/{id}', [
    'uses' => 'PostController@update',
    'as' => 'post.update'
]);

Route::get('/post/delete/{id}', [
    'uses' => 'PostController@delete',
    'as' => 'post.delete'
]);

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
