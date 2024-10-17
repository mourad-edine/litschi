<?php

namespace App\Http\Controllers\payement;

use App\Http\Controllers\Controller;
use App\Models\Livraison;
use App\Models\Payement;
use Illuminate\Http\Request;

class PayementController extends Controller
{
    public function store_payement(Request $request){
        if ($request) {
            $var = [
                'livraison_id' => $request->livraison_id,
                'montant' => $request->montant,
                'mode_payement' => $request->mode_payement,
                'date_payement'=> $request->date_payement
            ];
            $insert = Payement::firstOrCreate($var);

            $livraison = Livraison::FindOrFail($request->livraison_id);
            if($livraison){
                $livraison->etat = "payé";
                $livraison->save();
            }
            return [
                'livraison' => $livraison,
                'payement' => $insert
            ];

        }
    }

    public function showPayement(){
        $test = new Payement();
        return $test->getPayement();
    }

    public function detailPayement($id){
        $test = Payement::findOrfail($id);
        return $test;
    }
    public function deletePayement($id){
        $valeur = Payement::findorfail($id);
        if($valeur){
            $valeur->delete();
        }
        return response()->json([
            'message' => 'valeur supprimé avec succès'
        ]);
    }
}
