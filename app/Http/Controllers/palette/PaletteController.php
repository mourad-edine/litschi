<?php

namespace App\Http\Controllers\palette;

use App\Http\Controllers\Controller;
use App\Models\Commande;
use App\Models\Dechet;
use App\Models\Livraison;
use App\Models\Palette;
use Illuminate\Http\Request;

class PaletteController extends Controller
{
    public function store_palette(Request $request)
    {
       
        if ($request) {
            $palette = [
                'type' => $request->type,
                'nombre_carton' => (int)$request->nombre_carton,
            ];
            $insert = Palette::create($palette);
            return $insert;

        }
    }

    public function suivi(){
        $quantite_commande = Commande::sum('quantite_commande');
        $nombre_caissette = Livraison::sum('nombre_caissette');
        $total_kilo = (int)$nombre_caissette * 18;
        $estimation_kilo = (int)$nombre_caissette * 20;
        $nombre_palettre = Palette::count('id');
        $quantite_dechet = Dechet::sum('pourcentage_dechet');

        return response()->json([
            'quantite_commande' => $quantite_commande,
            'nombre_caissette' => $nombre_caissette,
            'total_kilo' => $total_kilo,
            'estimation_kilo' => $estimation_kilo,
            'nombre_palettre' => $nombre_palettre,
            'quantite_dechet' => $quantite_dechet

        ]);
    }

    public function showPalette(){
        $test = new Palette();
        return $test->getPalette();
    }

    public function detailPalette($id){
        $test = Palette::findOrfail($id);
        return $test;
    }

    
}
