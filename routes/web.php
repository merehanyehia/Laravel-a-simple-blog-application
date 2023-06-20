<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/blogs/all', [App\Http\Controllers\BlogController::class, 'view'])->name('AllBlogs')->middleware('auth');

Route::get('/blogs', [App\Http\Controllers\BlogController::class, 'index'])->name('blogs')->middleware('auth');

Route::get('/blogs/{id}', [App\Http\Controllers\BlogController::class, 'blogDetail'])->name('blogDetail')->middleware('auth');

Route::get('/blogs/new', [App\Http\Controllers\BlogController::class, 'blogs'])->name('addBlog')->middleware('auth');

Route::post('/blogs/add', [App\Http\Controllers\BlogController::class, 'create'])->name('createBlog')->middleware('auth');

Route::delete('/blogs/delete/{id}', [App\Http\Controllers\BlogController::class, 'delete'])->name('deleteBlog')->middleware('auth');


// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
