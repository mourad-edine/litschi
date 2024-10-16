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
    public function showCommande(){
        $test = new Commande();
        return $test->getCommande();
    }
    
    public function detailCommande($id){
        $test = Commande::findOrfail($id);
        return $test;
    }
    public function Show_lastIdCommande(){
        $lastItem = Commande::orderBy('id', 'desc')->first();
        return $lastItem;
    }
}


