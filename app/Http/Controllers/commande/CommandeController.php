<?php

namespace App\Http\Controllers\commande;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Commande;

class CommandeController extends Controller
{
    public function store_commande(Request $request)
    {
        if ($request) {
            $test = new Commande();
            $var = [
                'evenement_id' => $request->evenement_id,
                'quantite_commande' => $request->quantite,
                'etat' => "envoyé",
                'avance' => $request->avance
                //etat ,id_commande
            ];
            $insert = Commande::create($var);
            return [
                "insert" => $insert,
                "tous" => $test->getCommande()
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
}


