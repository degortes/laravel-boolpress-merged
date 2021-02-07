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



Auth::routes();

Route::get('/', 'HomeController@index')->name('index');
Route::post('/request', 'HomeController@requestInfo')->name('request.info');
Route::get('/contacts', 'HomeController@contatti')->name('contacts');
Route::get('/thanks', 'HomeController@thanks')->name('thanks');
Route::get('/categories', 'CategoriesController@index')->name('categories.index');
Route::get('/categories/{slug}', 'CategoriesController@show')->name('categories.show');
Route::get('/posts', 'PostController@index')->name('posts.index');
Route::get('/posts/{slug}', 'PostController@show')->name('posts.show');

Route::middleware('auth')->namespace('Admin')->prefix('admin')->name('admin.')->group(function () {

    Route::get('/', 'HomeController@index')->name('index');
    Route::resource('/posts', 'PostController');
    Route::resource('/tags', 'TagsController');
    Route::resource('/categories', 'CategoryController');
    Route::post('/generator', 'HomeController@generator')->name('generator');
});
