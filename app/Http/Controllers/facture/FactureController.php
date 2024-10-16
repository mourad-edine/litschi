<?php

namespace App\Http\Controllers\facture;

use App\Http\Controllers\Controller;
use App\Models\Facture;
use Illuminate\Http\Request;

class FactureController extends Controller
{
    public function store_facture(Request $request)
    {
        if ($request) {
            $var = [
                'livraison_id' => $request->nom_fournisseur,
            ];
            $insert = Facture::firstOrCreate($var);
            return $insert;

        }
    }

    public function showFacture(){
        $test = new Facture();
        return $test->getFacture();
    }

    public function detailFacture($id){
        $test = Facture::findOrfail($id);
        return $test;
    }
    public function deleteFacture($id){
        $valeur = Facture::findorfail($id);
        if($valeur){
            $valeur->delete();
        }
        return response()->json([
            'message' => 'valeur supprimé avec succès'
        ]);
    }
}
