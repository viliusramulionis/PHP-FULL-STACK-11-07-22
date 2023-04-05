<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class ProductsController extends Controller
{
    public function index() {
        $data = Products::with('categories')->get();

        return $data;
    }

    public function singleProduct($id) {
        try {
            return Products::with('categories')->find($id);
        } catch(\Exception $e) {
            return response('Nepavyko gauti produkto duomenų', 500);
        }
    }

    public function search($keyword) {
        try {
            return Products::where('name', 'LIKE', '%'.$keyword.'%')
                            ->orWhere(['sku' => $keyword])->get();
                            
        } catch(\Exception $e) {
            return response('Nepavyko gauti produktų', 500);
        }
    }

    public function order($field, $order) {
        try {
            return Products::with('categories')->orderBy($field, $order)->get();                  
        } catch(\Exception $e) {
            return response('Nepavyko gauti produktų', 500);
        }
    }

    public function create(Request $request) {
        try {
            $data = new Products;

            $data->name = $request->name;
            $data->sku = $request->sku;
            $data->photo = $request->photo;
            $data->warehouse_qty = $request->warehouse_qty;
            $data->price = $request->price;
            $data->save();

            $data->categories()->attach($request->categories);  

            return 'Produktas sėkmingai sukurtas';
        } catch(\Exception $e) {
            return response('Įvyko serverio klaida', 500);
        }
    }

    public function edit(Request $request, $id) {
        try {
            $data = Products::find($id);

            $data->name = $request->name;
            $data->sku = $request->sku;
            $data->photo = $request->photo;
            $data->warehouse_qty = $request->warehouse_qty;
            $data->price = $request->price;
    
            $data->save();

            $data->categories()->sync($request->categories);

            return 'Prekė sėkmingai atnaujinta';
            
        } catch(\Exception $e) {
            return response('Atnaujinant įrašą įvyko klaida', 500);
        }
    }

    public function delete($id) {
        try {
            $data = Products::find($id);
            $data->categories()->detach();
            $data->delete();
            
            return 'Produktas sėkmingai ištrintas';
        } catch(\Exception $e) {
            return response('Atsiprašome įvyko klaida', 500);
        }
    }
}
