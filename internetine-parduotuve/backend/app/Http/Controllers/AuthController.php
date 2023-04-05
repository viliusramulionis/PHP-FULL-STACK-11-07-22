<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function index() {
        return 'Zmogus prisijunges';
    }

    public function login(Request $request) {
        try {
            $data = [
                'email' => $request->email,
                'password' => $request->password
            ];

            if(!auth()->attempt($data))
                return response('Neteisingi prisijungimo duomenys', 401);

            return [
                'message' => 'Prisijungimas sėkmingas',
                'token' => auth()->user()->createToken('ReactToken')->plainTextToken
            ];
        } catch(\Exception $e) {
            return response('Įvyko serverio klaida', 500);
        }
    }

    public function register(Request $request) {
        try {
            $data = new User;

            $data->name = $request->name;
            $data->email = $request->email;
            $data->password = bcrypt($request->password);

            $data->save();

            return [
                'message' => 'Vartotojas sėkmingai sukurtas',
                'token' => $data->createToken('ReactToken')->plainTextToken
            ];

        } catch(\Exception $e) {
            return response('Įvyko serverio klaida', 500);
        }
    }

    public function logout() {
        try {
            auth()->user()->tokens->each(function ($token) {
                $token->delete();
            });

            return 'Sėkmingai atsijungėte';

        } catch(\Exception $e) {
            return response('Įvyko serverio klaida', 500);
        }
    }
}
