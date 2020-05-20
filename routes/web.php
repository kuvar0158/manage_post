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

// Route::get('/', function () {
//     return view('user_task.index');
// });
Route::get('/', 'PostController@index');
// Route::get('/reader', 'PostController@reader');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/new-dashboard', 'PostController@new_dashboard')->middleware('auth');

Route::get('add-post', 'PostController@add_post')->middleware('auth');

Route::post('save-task', 'PostController@save_task')->middleware('auth');

Route::get('show-post', 'PostController@show_post');

Route::get('edit-post/{id}', 'PostController@edit_post')->middleware('auth');

Route::get('view-post/{slug}', 'PostController@view_post');

Route::put('update-post/{id}', 'PostController@update_post')->middleware('auth');

Route::delete('delete-post/{id}', 'PostController@delete_post')->middleware('auth');

Route::get('show-all-post', 'PostController@show_all_post');

Route::post('show-data-tags', 'TagsController@show_data_tags');

Route::get('add-tags', 'TagsController@index')->middleware('auth');

Route::post('save-tags', 'TagsController@save_tags')->middleware('auth');







