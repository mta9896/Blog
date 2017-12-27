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

Route::get('/','PostsController@viewPosts');
Route::get('/posts/{post_id}','PostsController@viewPost');
Route::get('/postsAPI','PostsController@index');
Route::get('/commentsAPI','CommentsController@index');
Route::get('/usersAPI','UsersController@index');
Route::get('/create_post','PostsController@viewNewPostForm');
Route::post('/add_post','PostsController@addPost');
Route::post('/add_user','HomeController@addUser');
Route::get('/edit_post/{post_id}','PostsController@editPost');
Route::post('/edit/{post_id}','PostsController@edit');
Route::get('/delete_post/{post_id}','PostsController@delete');
Route::get('/user/{user_id}','UsersController@viewPosts');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
