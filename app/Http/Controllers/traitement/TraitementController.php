<?php

namespace App\Http\Controllers\traitement;

use App\Http\Controllers\Controller;
use App\Models\Traiter;
use Illuminate\Http\Request;

class TraitementController extends Controller
{
    public function store_traiter(Request $request)
    {
        if ($request) {
            $var = [
                'stock_id' => $request->stock_id,
                'dechet_id' => $request->dechet_id,
                'produit_fini_id' => $request->produit_fini_id, 
            ];
            $insert = Traiter::firstOrCreate($var);
            return $insert;

        }
    }

    public function showTraitement(){
        $test = new Traiter();
        return $test->getTraiter();
    }

    public function detailTraitement($id){
        $test = Traiter::findOrfail($id);
        return $test;
    }

    public function deleteTraitement($id){
        $valeur = Traiter::findorfail($id);
        if($valeur){
            $valeur->delete();
        }
        return response()->json([
            'message' => 'valeur supprimé avec succès'
        ]);
    }
}
