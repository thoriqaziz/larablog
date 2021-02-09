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


Route::get('/tags', [
    'uses' => 'TagController@index',
    'as' => 'tags'
]);

Route::get('/tag/create', [
    'uses' => 'TagController@create',
    'as' => 'tag.create'
]);

Route::post('/tag/store', [
    'uses' => 'TagController@store',
    'as' => 'tag.store'
]);

Route::get('/tag/edit/{id}', [
    'uses' => 'TagController@edit',
    'as' => 'tag.edit'
]);

Route::post('/tag/update/{id}', [
    'uses' => 'TagController@update',
    'as' => 'tag.update'
]);

Route::get('/tag/delete/{id}', [
    'uses' => 'TagController@delete',
    'as' => 'tag.delete'
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

Route::get('/post/trash/{id}', [
    'uses' => 'PostController@trash',
    'as' => 'post.trash'
]);

Route::get('/post/trashed', [
    'uses' => 'PostController@trashed',
    'as' => 'post.trashed'
]);

Route::get('/post/restore/{id}', [
    'uses' => 'PostController@restore',
    'as' => 'post.restore'
]);

Route::get('/post/delete/{id}', [
    'uses' => 'PostController@delete',
    'as' => 'post.delete'
]);



Route::get('/users', [
    'uses' => 'UserController@index',
    'as' => 'users'
]);

Route::get('/user/create', [
    'uses' => 'UserController@create',
    'as' => 'user.create'
]);

Route::post('/user/store', [
    'uses' => 'UserController@store',
    'as' => 'user.store'
]);

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
