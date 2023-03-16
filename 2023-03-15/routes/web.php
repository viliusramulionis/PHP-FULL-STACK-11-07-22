<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Blog;

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

// Route::get('/', 'Blog@index');
Route::get('/', [Blog::class, 'index']);
Route::get('/about-us', [Blog::class, 'aboutUs']);

