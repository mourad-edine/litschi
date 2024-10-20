<?php

namespace App\Http\Controllers\palette_fournisseur;

use App\Http\Controllers\Controller;
use App\Models\PaletteFournisseur;
use Illuminate\Http\Request;

class PaletteFournisseurController extends Controller
{
    public function store_palette_fournisseur(Request $request)
    {
        if ($request) {
            foreach($request->fournisseur as $fournisseur){
                $insert = PaletteFournisseur::firstOrCreate([
                    'palette_id' => $request->palette_id,
                    'type' => $request->type,
                    'nombre_carton' => $fournisseur['nombre_carton'],
                    'fournsseur_id' => $fournisseur['fournisseur_id']
                ]);
            }
           
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
