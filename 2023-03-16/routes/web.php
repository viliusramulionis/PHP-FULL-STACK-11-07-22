<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Posts;

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

//Visi įrašai
Route::get('/posts', [Posts::class, 'index']);

//Naujo įrašo formos atvaizdavimas
Route::get('/new-post', [Posts::class, 'newPost']);

//Duomenų išsaugojimas
Route::post('/new-post', [Posts::class, 'savePost']);
