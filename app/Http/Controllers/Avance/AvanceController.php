<?php

namespace App\Http\Controllers\Avance;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Avance;
use App\Models\Fourniseur;

class AvanceController extends Controller
{
    public function store_Avance(Request $request)
    {
        try {
            // Insérer les données dans la table avances
            $test = DB::table('avances')->insert([
                'fournisseur_id' => $request->input('fournisseur_id'),
                'montant_avance' => $request->input('montant_avance'),
                'date_avance' => $request->input('date_avance'),
                'mode_payement' => $request->input('mode_payement'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return response()->json([
                'message' => 'Avance enregistrée avec succès!',
                'valeur' => $test
            ]);
        } catch (QueryException $e) {
            // Vérifiez si c'est une erreur de contrainte unique (Duplicate Entry)
            if ($e->errorInfo[1] == 1062) {
                return response()->json(['Avertissement' => 'Duplicate entry: Le fournisseur a déjà une avance existante.'], 400);
            }

            // Autres erreurs possibles
            return response()->json(['avertissement' => 'Erreur lors de l\'enregistrement de l\'avance.'], 500);
        }
    }
    ///commande encoours ou envoyé
    public function showAvance()
    {
        $test = Fourniseur::whereHas('avance')->with('avance')->get();
        return $test;
    }

    ///toutes les commandes annulé


    public function detailAvance($id)
    {
        $test = Fourniseur::findOrfail($id)->avance;
        return $test;
    }
    public function Show_lastIdAvance()
    {
        $lastItem = Avance::orderBy('id', 'desc')->first();
        return $lastItem;
    }

    public function deleteAvance($id)
    {
        $valeur = Fourniseur::findOrfail($id)->avance;
        if ($valeur) {
            $valeur->delete();
        }
        return response()->json([
            'message' => 'valeur supprimé avec succès'
        ]);
    }
}
