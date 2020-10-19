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

Route::get('/', \App\Http\Controllers\ContentPost::class)->name('home');

Route::get('/user', \App\Http\Controllers\UserList::class)->name('user');

Route::get('/comment', \App\Http\Controllers\CommentGuest::class)->name('comment');
