<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class ProductsController extends Controller
{
    public function index() {
        $data = Products::all();

        return $data;
    }

    public function delete($id) {
        try {
            Products::find($id)->delete();
            return 'Produktas sėkmingai ištrintas';
        } catch(\Exception $e) {
            return response('Atsiprašome įvyko klaida', 500);
        }
    }
}
