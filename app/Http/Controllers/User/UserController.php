<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class UserController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('name', 'password');
        
        // Validation des champs
        $request->validate([
            'name' => 'required',
            'password' => 'required',
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
}
