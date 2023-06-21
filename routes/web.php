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
// Route::get('/blogs/all', [App\Http\Controllers\BlogController::class, 'view'])->name('blogs.all');

Route::controller(App\Http\Controllers\BlogController::class,)->name('blogs.')->prefix('blogs')->middleware('auth')->group(function(){

    Route::get('/new','blogs')->name('add');
    Route::post('/add', 'create')->name('create');
    Route::get('/all', 'view')->name('all');
    Route::get('', 'index')->name('blogs');
    Route::get('/{id}', 'blogDetails')->name('details');
    Route::put('/update/{id}', 'updateBlog')->name('update');
    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::delete('/delete/{id}', 'delete')->name('delete');

});




















