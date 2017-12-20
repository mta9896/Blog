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
    return view('landing-view');
});

Route::get('/posts','PostsController@viewPosts');
Route::get('/posts/{post_id}','PostsController@viewPost');
Route::get('/postsAPI','PostsController@index');
Route::get('/commentsAPI','CommentsController@index');
Route::get('/create_post','PostsController@viewNewPostForm');
Route::post('/add_post','PostsController@addPost');

