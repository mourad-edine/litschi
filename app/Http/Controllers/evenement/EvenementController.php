<?php

namespace App\Http\Controllers\evenement;

use App\Http\Controllers\Controller;
use App\Models\Evenement;
use Illuminate\Http\Request;

class EvenementController extends Controller
{
    public function store_evenement(Request $request)
    {
        if ($request) {
            $var = [
                'nom_evenement' => $request->nom_evenement,
            ];
            $insert = Evenement::create($var);
            return $insert;

        }
    }

    public function showEvenement(){
        $test = new Evenement();
        return $test->getEvenement();
    }

    public function detailEvent($id){
        $test = Evenement::findOrfail($id);
        return $test;
    }

    public function deleteEvent($id){
        $valeur = Evenement::findorfail($id);
        if($valeur){
            $valeur->delete();
        }
        return response()->json([
            'message' => 'valeur supprimé avec succès'
        ]);
    }


}
