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
                'commande_id' => (int)$request->commande_id,
                'quantite' => (int)$request->quantite,
                'nombre_caissette' => (int)$request->nombre_caissette,
                'date_livraison' => $request->date_livraison,
                'etat' => 'non payé'
            ];

            $commande = Commande::findOrFail($request->commande_id);
            if ($commande) {
                $test = (int)$commande->quantite_livre + (int)$request->quantite;
                if($test == (int)$commande->quantite_commande){
                    $commande->etat = "livré";
                    $commande->quantite_livre = $test;
                    $commande->save();
                    $livraison = Livraison::firstOrCreate($var);

                    return response()->json([
                        'message' => 'commande livré',
                        'valeur' => $livraison

                    ]);

                }else if($test < (int)$commande->quantite_commande){
                    $commande->etat = "encours";
                    $commande->quantite_livre = $test;
                    $commande->save();

                    $livraison = Livraison::firstOrCreate($var);
                    return response()->json([
                        'message' => 'commande encours',
                        'valeur' => $livraison
                    ]);
                    
                }else if($test > (int)$commande->quantite_commande){
                    return response()->json([
                        'valeur' => 'valeur trop grande !'
                    ]);

                }else{
                    return response()->json([
                        'valeur' => 'erreur inatendu de votre part !'
                    ]);
                }

            }
        }

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
