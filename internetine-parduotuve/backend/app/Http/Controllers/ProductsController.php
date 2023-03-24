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

    public function create(Request $request) {
        try {
            $product = new Products;

            $product->name = $request->name;
            $product->sku = $request->sku;
            $product->photo = $request->photo;
            $product->warehouse_qty = $request->warehouse_qty;
            $product->price = $request->price;

            $product->save();
            
            return 'Produktas sėkmingai sukurtas';
        } catch(\Exception $e) {
            return response('Nepavyko išssaugoti produkto', 500);
        }
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
