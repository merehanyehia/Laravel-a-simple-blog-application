<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Route::get('/blogs/all', [App\Http\Controllers\BlogController::class, 'view'])->name('blogs.all');

Route::controller(App\Http\Controllers\BlogController::class,)->name('blogs.')->prefix('blogs')->middleware('auth')->group(function(){

    Route::get('/new','blogs')->name('add');
    Route::post('/add', 'create')->name('create');
    Route::get('', 'index')->name('blogs');
    Route::get('/{id}', 'blogDetails')->name('details');
    Route::get('/{id}/comments','viewComments')->name('comments');
    Route::put('/update/{id}', 'updateBlog')->name('update');
    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::delete('/delete/{id}', 'destroy')->name('delete');
    Route::get('/{id}/comments', 'viewComments')->name('comments');

});


Route::controller(App\Http\Controllers\CommentController::class,)->name('comments')->prefix('comments')->middleware('auth')->group(function(){

    Route::post('/comment/{id}','store')->name('.store');
    Route::get('/comment/{comment}/updateForm', 'edit')->name('.edit');
    Route::put('/comment/{id}/update', 'update')->name('.update');
    Route::delete('/{comment}/comments', 'destroy')->name('.delete');

});
















// Route::post('/blogs/comment/{id}',[App\Http\Controllers\CommentController::class, 'store'])->name('comment.store')->middleware('auth');



// Route::get('/blogs/comment/{comment}/updateForm',[App\Http\Controllers\CommentController::class, 'edit'])->name('comment.edit');
// Route::put('/blogs/comment/{id}/update',[App\Http\Controllers\CommentController::class, 'update'])->name('comment.update');
























Route::delete('/blogs/{comment}/comments', [App\Http\Controllers\CommentController::class, 'destroy'])->name('comment.delete')->middleware('auth');
// Route::get('/blogs/comment/{comment}/updateForm',[App\Http\Controllers\CommentController::class, 'edit'])->name('comment.edit');
// Route::put('/blogs/comment/{id}/update',[App\Http\Controllers\CommentController::class, 'update'])->name('comment.update');
// Route::delete('/blogs/{comment}/comments', [App\Http\Controllers\CommentController::class, 'destroy'])->name('comment.delete')->middleware('auth');



// Auth::routes();



