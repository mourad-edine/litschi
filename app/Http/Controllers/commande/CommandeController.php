<?php

namespace App\Http\Controllers\commande;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Commande;

class CommandeController extends Controller
{
    public function store_commande(Request $request)
    {
        $valeur_sans_espace = str_replace(' ', '', $request->input('montant_avance'));
        $montant = (int)$valeur_sans_espace;
       if ($request){
            $var = [
                'fournisseur_id' => (int)$request->fournisseur_id,
                'nom_sous_fournisseur' => $request->nom_sous_fournisseur,
                'evenement_id' => $request->evenement_id,
                'quantite_commande' => (int)$request->quantite,
                'etat' => "envoyé",
                'montant_avance' => (int)$montant,
                'date_commande' => $request->date
                //etat ,id_commande
            ];
            $insert = Commande::create($var);
            return response()->json([
                'message' => 'Success',
                'valeurs' => $insert
            ]);
        
        
        }else{
            $var = [
                'fournisseur_id' => (int)$request->fournisseur_id,
                'nom_sous_fournisseur' => $request->nom_sous_fournisseur,
                'evenement_id' => $request->evenement_id,
                'quantite_commande' => (int)$request->quantite,
                'etat' => "envoyé",
                'montant_avance' => (int)$montant,
                'date_commande' => $request->date
                //etat ,id_commande
            ];
            $insert = Commande::create($var);
            return response()->json([
                'message' => 'Success',
                'valeur' => $insert
            ]);
        }
    }
    ///commande encoours ou envoyé
    public function showCommande(){
        $test = new Commande();
        return $test->getCommande();
    }

    public function showCommandeNoLivre(){
        $test = new Commande();
        return $test->getCommandeNoLivre();
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
    public function detailCommande2($id){
        $valeur = Commande::findorfail($id);
        return response()->json([
            'quantite_commande' => $valeur->quantite_commande
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
    public function showCommandeAll(){
        return Commande::with('fournisseur')->get();
    }
}


