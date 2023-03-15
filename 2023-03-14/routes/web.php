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
    return view('sveiki', [
        'vardas' => 'Jonai',
        'sarasas' => [
            'Vištiena',
            'Prieskoniai',
            'Duona',
            'Sviestas'
        ],
        'uzsakymai' => [
            '#6516516'
        ]
    ]);
});

Route::get('/main', function () {
    return view('welcome');
});
