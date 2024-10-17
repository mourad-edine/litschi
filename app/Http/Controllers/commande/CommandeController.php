<?php

namespace App\Http\Controllers\commande;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Commande;

class CommandeController extends Controller
{
    public function store_commande(Request $request)
    {
        $test = new Commande();
        if ($request) {
            $var = [
                'fournisseur_id' => $request->fournisseur_id,
                'evenement_id' => $request->evenement_id,
                'quantite_commande' => $request->quantite,
                'etat' => "envoyé",
                'avance' => $request->avance,
                'date_commande' => $request->date
                //etat ,id_commande
            ];
            $insert = Commande::create($var);
            return [
                "insert" => $insert,
                "information" => $test->getCommande(),
            ];
        }
    }
    ///commande encoours ou envoyé
    public function showCommande(){
        $test = new Commande();
        return $test->getCommande();
    }

    public function showCommandeLivre(){
        $test = new Commande();
        return $test->getCommandeLivre();
    }
///toutes les commandes annulé
    public function showCommandeAnnule(){
        $test = new Commande();
        return $test->getCommandeAnnule();
    }
    
    public function detailCommande($id){
        $test = Commande::findOrfail($id);
        return $test;
    }
    public function Show_lastIdCommande(){
        $lastItem = Commande::orderBy('id', 'desc')->first();
        return $lastItem;
    }

    public function deleteCommande($id){
        $valeur = Commande::findorfail($id);
        if($valeur){
            $valeur->delete();
        }
        return response()->json([
            'message' => 'valeur supprimé avec succès'
        ]);
    }

    public function AnnulerCommande($id){
        $valeur = Commande::findorfail($id);
        if($valeur){
            $valeur->etat = "annulé";
            $valeur->save();
        }
        return response()->json([
            'message' => 'commande annulé avec succes'
        ]);
    }
}


