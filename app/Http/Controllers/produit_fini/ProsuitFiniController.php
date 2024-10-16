<?php

namespace App\Http\Controllers\produit_fini;

use App\Http\Controllers\Controller;
use App\Models\ProduitFini;
use Illuminate\Http\Request;

class ProsuitFiniController extends Controller
{
    public function store_produit_fini(Request $request)
    {
        if ($request) {
            $var = [
                'nombre_produit_fini' => $request->nom_fournisseur,
            ];
            $insert = ProduitFini::firstOrCreate($var);
            return $insert;

        }
    }

    public function showProduitFini(){
        $test = new ProduitFini();
        return $test->getProduiFini();
    }

    public function detailProduitFini($id){
        $test = ProduitFini::findOrfail($id);
        return $test;
    }

    public function deleteProduitFini($id){
        $valeur = ProduitFini::findorfail($id);
        if($valeur){
            $valeur->delete();
        }
        return response()->json([
            'message' => 'valeur supprimé avec succès'
        ]);
    }
}
