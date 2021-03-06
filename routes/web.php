<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', "BlogController@index");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/blogs', "BlogController@index")->name('blogs.index');
Route::get('/blogs/create', "BlogController@create")->name('blogs.create');
Route::post('/blogs/store', "BlogController@store")->name('blogs.store');
// Keep trashed routes here
Route::get('/blogs/trash', 'BlogController@trash')->name('blogs.trash');
Route::get('/blogs/trash/{id}/restore', 'BlogController@restore')->name('blogs.restore');
Route::delete('/blogs/trash/{id}/permanentDelete', 'BlogController@permanentDelete')->name('blogs.permanentDelete');

Route::get('/blogs/{id}', "BlogController@show")->name('blogs.show');
Route::get('/blogs/{id}/edit', "BlogController@edit")->name('blogs.edit');
Route::patch('/blogs/{id}/update', "BlogController@update")->name('blogs.update');
Route::delete('/blogs/{id}/delete', "BlogController@delete")->name('blogs.delete');

// Admin routes
Route::get('/admin', 'AdminController@index')->name('admin.index');

// Route resource for category
Route::resource('categories', 'CategoryController');
