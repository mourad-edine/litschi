<?php

namespace App\Http\Controllers\produit;

use App\Http\Controllers\Controller;
use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    public function store_produit(Request $request)
    {
        if ($request) {
            $var = [
                'fournisseur_id' => $request->nom_fournisseur,
                'nom_produit' => $request->adresse, 
                'description'=>$request->description,
                'prix' => $request->prix
            ];
            $insert = Produit::firstOrCreate($var);
            return $insert;

        }
    }

    public function showProduit(){
        $test = new Produit();
        return $test->getProduit();
    }

    public function detailProduit($id){
        $test = Produit::findOrfail($id);
        return $test;
    }

    public function deleteProduit($id){
        $valeur = Produit::findorfail($id);
        if($valeur){
            $valeur->delete();
        }
        return response()->json([
            'message' => 'valeur supprimé avec succès'
        ]);
    }
}
