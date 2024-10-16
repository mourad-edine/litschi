<?php

namespace App\Http\Controllers\fournisseur;

use App\Http\Controllers\Controller;
use App\Models\Fourniseur;
use Illuminate\Http\Request;

class FournisseurController extends Controller
{
    public function store_fournisseur(Request $request)
    {
        if ($request) {
            $var = [
                'nom_fournisseur' => $request->nom_fournisseur,
                'adresse' => $request->adresse, 
            ];
            $insert = Fourniseur::firstOrCreate($var);
            return $insert;

        }
    }

    public function showFournisseur(){
        $test = new Fourniseur();
        return $test->getFournisseur();
    }

    public function detailFournisseur($id){
        $test = Fourniseur::findOrfail($id);
        return $test;
    }
}
