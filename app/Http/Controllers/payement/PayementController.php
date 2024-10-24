<?php

namespace App\Http\Controllers\payement;

use App\Http\Controllers\Controller;
use App\Models\Commande;
use App\Models\Livraison;
use App\Models\Dechet;

use App\Models\Payement;
use Illuminate\Http\Request;

class PayementController extends Controller
{
    public function store_payement(Request $request)
    {
        if ($request) {
            $tab_pay = [
                'livraison_id' => (int)$request->livraison_id,
                'fournisseur_id' => (int)$request->fournisseur_id,
                'prix_jour' => (int)$request->prix_jour,
                'montant_paye' => (int)$request->montant_paye,
                'montant_deduise' => (int)$request->avance_deduise,
                'date_payement' => $request->date_payement,
                'mode_payement' => $request->mode_payement

            ];
            Payement::create($tab_pay);
            $livraison = Livraison::findorfail($request->livraison_id);
            if($livraison){
                $livraison->etat = "payé";
                $livraison->save();
            }


            $tab_dechet = [
                'livraison_id' => $livraison->id,
                'fournisseur_id' => (int)$request->fournisseur_id,
                'pourcentage_dechet' => (int)$request->pourcentage_dechet,
            ];
            Dechet::create($tab_dechet);

            $commande = Commande::findorfail($livraison->commande_id);
            if($commande){
                $commande->montant_avance -= (int)$request->avance_deduise;
                $commande->save();
            }

            return response()->json([
                'message' => 'payement effectué avec succes !'
            ]);
        }
    }

    public function showPayement()
    {
        $test = new Payement();
        return $test->getPayement();
    }

    public function detailPayement($id)
    {
        $test = Payement::findOrfail($id);
        return $test;
    }
    public function deletePayement($id)
    {
        $valeur = Payement::findorfail($id);
        if ($valeur) {
            $valeur->delete();
        }
        return response()->json([
            'message' => 'valeur supprimé avec succès'
        ]);
    }
}
