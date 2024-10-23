<?php

namespace App\Http\Controllers\price;

use App\Http\Controllers\Controller;
use App\Models\Commande;
use App\Models\Dechet;
use App\Models\Fourniseur;
use App\Models\Livraison;
use App\Models\Palette;
use App\Models\TodayPrice;
use Illuminate\Http\Request;

class PriceTodayController extends Controller
{
    public function store_price(Request $request)
    {
        if ($request) {
            $var = [
                'prix' => (int)$request->prix,
                'date_today' => $request->date_today,

            ];
            $insert = TodayPrice::firstOrCreate($var);
            return $insert;

        }
    }

    public function Show_lastIdprice(){
        $lastItem = TodayPrice::orderBy('id', 'desc')->first();
        return $lastItem;
    }

    public function compte()
    {
        $fournisseur = Fourniseur::count();
        $livraison = Livraison::sum('quantite');
        $commande = Commande::sum('quantite_commande');
        $dechet = Dechet::sum('pourcentage_dechet');
        $palette = Palette::count();
        $sous_fournisseur = Commande::whereNotNull('nom_sous_fournisseur')->count();

        return response()->json([
            'nombre_fournissseur' => $fournisseur,
            'total_quantite_commande' => $commande,
            'nombre_livraison'  => $livraison,
            'nombre_dechet' => $dechet,
            'nombre_palette' => $palette,
            'nombre_sous_fournisseur' => $sous_fournisseur
        ]);
    }
}
