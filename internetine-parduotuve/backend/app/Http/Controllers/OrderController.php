<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index() {
        try {
            return Order::all();
        } catch(\Exception $e) {
            return response('Nepavyko gauti užsakymų sąrašo', 500);
        }
    }

    public function create(Request $request) {
        try {
            $data = new Order;

            $data->first_name = $request->first_name;
            $data->last_name = $request->last_name;
            $data->address = $request->address;
            $data->phone = $request->phone;
            $data->email = $request->email;
            $data->payment_method = $request->payment_method;
            $data->shipping_method = $request->shipping_method;
            $data->product_qty = $request->product_qty;
            $data->product_id = $request->product_id;

            $data->save();
            
            return 'Užsakymas sėkmingai sukurtas';
        } catch(\Exception $e) {
            return response('Nepavyko išssaugoti užsakymo', 500);
        }
    }

    public function edit(Request $request, $id) {
        try {
            $data = Order::find($id);

            $data->is_completed = $request->is_completed;
    
            $data->save();
            return 'Užsakymo statusas sėkmingai atnaujintas';
            
        } catch(\Exception $e) {
            return response('Atnaujinant įrašą įvyko klaida', 500);
        }
    }
}
