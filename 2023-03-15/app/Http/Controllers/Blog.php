<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Blog extends Controller
{
    public function index()
    {
        //return '<h1>Titulinis puslapis</h1>';
        return view('home', [
            'nav' => [
                'Titulinis',
                'Apie Mus',
                'Blogas'
            ]
        ]);
    }

    public function aboutUs() {
        return view('aboutus', [
            'nav' => [
                'Titulinis',
                'Apie Mus',
                'Blogas'
            ]
        ]); 
    }
}
