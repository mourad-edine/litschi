<?php

namespace App\Http\Controllers\livraison;

use App\Http\Controllers\Controller;
use App\Models\Commande;
use App\Models\Dechet;
use Illuminate\Http\Request;
use App\Models\Livraison;
use App\Models\Payement;

class LivraisonController extends Controller
{
    public function store_livraison(Request $request)
    {
        if ($request) {
            $var = [
                'commande_id' => $request->commande_id,
                'quantite' => $request->quantite,
                'nombre_caissette' => $request->nombre_caissette,
                'date_livraison' => $request->date_livraison,
                'etat' => 'non payé'
            ];
            $livraison = Livraison::create($var);

            $commande = Commande::findOrFail($request->commande_id);
            if ($commande) {
                $commande->quantite_livre += $request->quantite;
                if($commande->quantite_livre == $commande->quantite_commande){
                    $commande->etat = "livré";

                }else if($commande->quantite_livre < $commande->quantite_commande){
                    $commande->etat = "encours";

                }else{
                    $commande->etat = "";

                }
                return response()->json([
                    'message' => 'commande livré'
                ]);

            }



            $commande->save();
        }


        return $livraison;
    }

    public function showLivraison()
    {
        $test = new Livraison();
        return $test->getLivraison();
    }

    public function detailLivraison($id)
    {
        $test = Livraison::findOrfail($id);
        return $test;
    }

    public function deleteLivraison($id)
    {
        $valeur = Livraison::findorfail($id);
        if ($valeur) {
            $valeur->delete();
        }
        return response()->json([
            'message' => 'valeur supprimé avec succès'
        ]);
    }

    public function getPaid()
    {
        $valeur = Livraison::where('etat', 'payé')->get();
        return $valeur;
    }

    public function getUnpaid()
    {
        $valeur = Livraison::where('etat', 'non payé')->get();
        return $valeur;
    }
}
