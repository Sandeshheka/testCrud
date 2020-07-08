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



//post crud route
Route::get('/', 'PostController@allPost');
Route::get('/addPost', 'PostController@addPost');
Route::post('/insertPost', 'PostController@insertPost');
Route::get('/editPost/{id}', 'PostController@editPost');
Route::post('/updatePost', 'PostController@updatePost');
Route::get('/deletePost/{id}', 'PostController@deletePost');

