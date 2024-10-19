<?php

namespace App\Http\Controllers\palette_fournisseur;

use App\Http\Controllers\Controller;
use App\Models\PaletteFournisseur;
use Illuminate\Http\Request;

class PaletteFournisseurController extends Controller
{
    public function store_palette_fournisseur(Request $request)
    {
        dd($request->all());
        if ($request) {
            $var = [
                'fournisseur_id' => $request->fournisseur_id,
                'palette_id' => $request->palette_id,
                'type' => $request->type,
                'nombre_carton' => $request->nombre_carton,
            ];
            $insert = PaletteFournisseur::firstOrCreate($var);
            return $insert;

        }
    }

    public function showPaletteFournisseur(){
        $test = new PaletteFournisseur();
        return $test->getPalettefournisseur();
    }

    public function detailPaletteFourinisseur($id){
        $test = PaletteFournisseur::findOrfail($id);
        return $test;
    }
}
