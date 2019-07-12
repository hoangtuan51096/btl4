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

        Route::post('create-book', 'Admin\BookController@addBook');

        Route::post('create-author', 'Admin\AuthorController@addAuthor');

        Route::get('edit-author', 'Admin\AuthorController@editAuthorAjax');

        Route::post('update-author', 'Admin\AuthorController@updateAuthorAjax');

        Route::get('edit-book', 'Admin\BookController@editBookAjax');

        Route::post('update-book', 'Admin\BookController@updateBookAjax');

        Route::get('edit-user', 'Admin\UserController@editUserAjax');

        Route::post('edit-user', 'Admin\UserController@updateUserAjax');

        Route::get('trash','Admin\TrashController@index')->name('trashIndex');

        Route::get('trash-user','Admin\UserController@getAllTrash');

        Route::get('trash-author','Admin\AuthorController@getAllTrash');

        Route::get('trash-book','Admin\BookController@getAllTrash');

        Route::post('restore-user','Admin\UserController@restoreTrash')->name('restoreUser');

        Route::post('restore-author','Admin\AuthorController@restoreTrash')->name('restoreAuthor');

        Route::post('restore-book','Admin\BookController@restoreTrash')->name('restoreBook');

        Route::post('delete-user','Admin\UserController@deleteTrash')->name('deleteUser');

        Route::post('delete-author','Admin\AuthorController@deleteTrash')->name('deleteAuthor');

        Route::post('delete-book','Admin\BookController@deleteTrash')->name('deleteBook');
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::middleware('auth')->group(function() {
    Route::resource('book-client', 'BookController');

    Route::resource('user-client', 'UserController');

    Route::get('view-rent-book','BookController@viewRentBook');

    Route::get('detail-book','BookController@viewDetailBook');

    Route::post('rent-book','UserController@rentBook')->name('rentBook');

    Route::get('give-back-book','UserController@viewGiveBackBook')->name('viewGiveBackBook');

    Route::post('give-back-book','UserController@giveBackBook')->name('giveBackBook');
});
