<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;

class CategoriesController extends Controller
{
    public function index() {
        try {
            return Categories::all();
        } catch(\Exception $e) {
            return response('Nepavyko gauti kategorijų sąrašo', 500);
        }
    }

    public function categoryProducts($id) {
        try {
            return Categories::with('products')->find($id);
        } catch(\Exception $e) {
            return response('Nepavyko gauti kategorijos duomenų', 500);
        }
    }

    public function singleCategory($id) {
        try {
            return Categories::find($id);
        } catch(\Exception $e) {
            return response('Nepavyko gauti kategorijos duomenų', 500);
        }
    }

    public function create(Request $request) {
        try {
            $data = new Categories;

            $data->name = $request->name;

            $data->save();
            
            return 'Kategorija sėkmingai sukurta';
        } catch(\Exception $e) {
            return response('Nepavyko išssaugoti produkto', 500);
        }
    }

    public function edit(Request $request, $id) {
        try {
            $data = Categories::find($id);

            $data->name = $request->name;
    
            $data->save();
            return 'Kategorija sėkmingai atnaujinta';
            
        } catch(\Exception $e) {
            return response('Atnaujinant įrašą įvyko klaida', 500);
        }
    }

    public function delete($id) {
        try {
            Categories::find($id)->delete();
            return 'Kategorija sėkmingai ištrinta';
        } catch(\Exception $e) {
            return response('Atsiprašome įvyko klaida', 500);
        }
    }
}
