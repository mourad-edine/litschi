<?php

namespace App\Http\Controllers\sous_fournisseur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SousFournisseur;
class SousFournisseurController extends Controller
{
    public function store_sous_fournisseur(Request $request)
    {
        if ($request) {
            $var = [
                'fournisseur_id' => $request->fournisseur_id,
                'nom_sous_fournisseur' => $request->nom_sous_fournisseur,
                'adresse' => $request->adresse, 
            ];
            $insert = SousFournisseur::firstOrCreate($var);
            return $insert;

        }
    }

    public function showSousFournisseur(){
        $test = new SousFournisseur();
        return $test->getSousFournisseur();
    }

    public function detailSousFournisseur($id){
        $test = SousFournisseur::findOrfail($id);
        return $test;
    }
}
