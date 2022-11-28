<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
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


Route::get('/', [PostController::class, 'index']);
Route::get('/post/{slug}', [PostController::class, 'show'])->name('post');
Route::get('/category/{slug}', [CategoryController::class, 'index'])->name('category');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
