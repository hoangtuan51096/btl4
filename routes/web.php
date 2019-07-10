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
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::prefix('admin')->group(function () {
    Route::middleware('auth')->group(function() {
        Route::resource('user', 'Admin\UserController');

        Route::resource('book', 'Admin\BookController');

        Route::resource('author', 'Admin\AuthorController');

        Route::post('create-user', 'Admin\UserController@addUser');

        Route::post('create-author', 'Admin\AuthorController@addAuthor');

        Route::get('edit-author', 'Admin\AuthorController@editAuthorAjax');

        Route::post('edit-author', 'Admin\AuthorController@updateAuthorAjax');

        Route::get('edit-user', 'Admin\UserController@editUserAjax');

        Route::post('edit-user', 'Admin\UserController@updateUserAjax');

        Route::post('my-form','Admin\UserController@myformPost');
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
