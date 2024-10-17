<?php

namespace App\Http\Controllers\livraison;

use App\Http\Controllers\Controller;
use App\Models\Commande;
use App\Models\Evenement;
use Illuminate\Http\Request;
use App\Models\Livraison;
class LivraisonController extends Controller
{
    public function store_livraison(Request $request)
    {
        if ($request) {
            $var = [
                'commande_id' => $request->commande_id,
                'fournisseur_id' => $request->fournisseur_id,
                'quantite' => $request->quantite,
            ];
            $livraison = Livraison::create($var);

            $commande = Commande::findOrFail($request->commande_id);
            if($commande){
                if($commande->quantite_commande < $commande->quantite_livre + $livraison->quantite){
                    return response()->json([
                        'message' => 'vous avez entré un grand nombre'
                    ]);
                }
                else if($commande->quantite_commande == $commande->quantite_livre + $livraison->quantite){
                    $commande->etat = "livré";
                }
                else{
                    $commande->quantite_livre += $livraison->quantite;
                    $commande->etat = "encours";
                }

                $commande->save();
                    

            }

            return $livraison;

        }
    }

    public function showLivraison(){
        $test = new Livraison();
        return $test->getLivraison();
    }

    public function detailLivraison($id){
        $test = Livraison::findOrfail($id);
        return $test;
    }

    public function deleteLivraison($id){
        $valeur = Livraison::findorfail($id);
        if($valeur){
            $valeur->delete();
        }
        return response()->json([
            'message' => 'valeur supprimé avec succès'
        ]);
    }

    public function getPaid(){
        $valeur = Livraison::where('etat','payé')->get();
        return $valeur;
    }

    public function getUnpaid(){
        $valeur = Livraison::where('etat','non payé')->get();
        return $valeur;
    }


}
