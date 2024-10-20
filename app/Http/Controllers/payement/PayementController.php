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
            if ($commande->montant_avance >  $request->montant) {
                $commande->montant_avance -= $request->montant;
                $tab_pay = [
                    'livraison_id' => $livraison->id,
                    'montant' => $request->montant,
                    'mode_payement' => $request->mode_payement,
                    'date_payement' => $request->date_payement

                ];
                Payement::create($tab_pay);
            } else if ($commande->montant_avance <  $request->montant) {
                $commande->montant_avance = 0;
                $tab_pay = [
                    'livraison_id' => $livraison->id,
                    'montant' => $request->montant,
                    'mode_payement' => $request->mode_payement,
                    'date_payement' => $request->date_payement

                ];
                
                $tab_dechet = [
                    'fournisseur_id' => $commande->fournisseur_id,
                    'livraison_id' => $livraison->id,
                    'pourcentage_dechet' => $request->pourcentage_dechet
                ];
                Dechet::create($tab_dechet);
                Payement::create($tab_pay);
            } else if ($commande->montant_avance ==  $request->montant) {
                $commande->montant_avance = 0;
                $tab_pay = [
                    'livraison_id' => $livraison->id,
                    'montant' => $request->montant,
                    'mode_payement' => $request->mode_payement,
                    'date_payement' => $request->date_payement

                ];
                
                $tab_dechet = [
                    'fournisseur_id' => $commande->fournisseur_id,
                    'livraison_id' => $livraison->id,
                    'pourcentage_dechet' => $request->pourcentage_dechet
                ];
                Dechet::create($tab_dechet);
                Payement::create($tab_pay);
            } else {
                return response()->json([
                    'message' => 'une erreur est survenu'
                ]);
            
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
