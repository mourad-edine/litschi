<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class UserController extends Controller
{
    public function login(Request $request)
    {
        $credentials = [
            'name' => $request->user ,
            'password' => $request->pass
        ];
        
        // Validation des champs
        $request->validate([
            'user' => 'required',
            'pass' => 'required',
        ]);

        // Tentative de connexion
        if (Auth::attempt($credentials)) {
            // Redirection après connexion réussie
            return response()->json([
                'result' => "ok"
            ]);
        }

        // Redirection après échec de connexion
        return response()->json([
            'result' => "not ok"
        ]);
    }

    public function store_user(Request $request){
        if ($request) {
            $var = [
                'name' => $request->user,
                'email' => $request->email,
                'password' => $request->pass

            ];
            $insert = User::firstOrCreate($var);
            return $insert;

        }
    }
}
