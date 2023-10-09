<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;



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

Route::get('/', [App\Http\Controllers\PostController::class, 'index'])->name('home');
Route::get('/{post:slug}', [App\Http\Controllers\PostController::class, 'show'])->name('view');
Route::get('/category/{category:slug}', [App\Http\Controllers\PostController::class, 'byCategory'])->name('by-category');