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
                if ($commande->quantite_commande < $commande->quantite_livre + $livraison->quantite) {
                    return response()->json([
                        'message' => 'vous avez entré un grand nombre'
                    ]);
                } else if ($commande->quantite_commande == $commande->quantite_livre + $livraison->quantite) {
                    $commande->etat = "livré";
                    $commande->quantite_livre += $livraison->quantite;

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
                        Payement::create($tab_pay);
                    } else if ($commande->montant_avance ==  $request->montant) {
                        $commande->montant_avance = 0;
                        $tab_pay = [
                            'livraison_id' => $livraison->id,
                            'montant' => $request->montant,
                            'mode_payement' => $request->mode_payement,
                            'date_payement' => $request->date_payement
    
                        ];
                        Payement::create($tab_pay);
                    } else {
                        return response()->json([
                            'message' => 'une erreur est survenu'
                        ]);
                    }
                    $tab_dechet = [
                        'fournisseur_id' => $commande->fournisseur_id,
                        'livraison_id' => $livraison->id,
                        'pourcentage_dechet' => $request->pourcentage_dechet
                    ];
                    Dechet::create($tab_dechet);
                    return response()->json([
                        'message' => 'commande livré'
                    ]);
                } else if ($commande->quantite_commande > $commande->quantite_livre + $livraison->quantite) {
                    $commande->quantite_livre += $livraison->quantite;
                    $commande->etat = "encours";
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
                        Payement::create($tab_pay);
                    } else if ($commande->montant_avance ==  $request->montant) {
                        $commande->montant_avance = 0;
                        $tab_pay = [
                            'livraison_id' => $livraison->id,
                            'montant' => $request->montant,
                            'mode_payement' => $request->mode_payement,
                            'date_payement' => $request->date_payement
    
                        ];
                        Payement::create($tab_pay);
                    } else {
                        return response()->json([
                            'message' => 'une erreur est survenu'
                        ]);
                    }
                    $tab_dechet = [
                        'fournisseur_id' => $commande->fournisseur_id,
                        'livraison_id' => $livraison->id,
                        'pourcentage_dechet' => $request->pourcentage_dechet
                    ];
                    Dechet::create($tab_dechet);
                } else {

                    return response()->json([
                        'message' => 'une erreur est survenu'
                    ]);
                }
                


                $commande->save();
            }


            return $livraison;
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
