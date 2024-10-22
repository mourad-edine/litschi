<?php

namespace App\Http\Controllers\palette_fournisseur;

use App\Http\Controllers\Controller;
use App\Models\Palette;
use App\Models\PaletteFournisseur;
use Illuminate\Http\Request;

class PaletteFournisseurController extends Controller
{
    public function store_palette_fournisseur(Request $request)
    {
        if($request){
            $palette = Palette::Create([
                'type' => $request->type,
                'nombre_carton' => (int)$request->nombre_carton,
            ]);
        
            // Insertion des données des fournisseurs associés
            foreach ($request->fournisseur as $fournisseur) {
                PaletteFournisseur::create([
                    'palette_id' => $palette->id,
                    'type' => $request->type,
                    'fournisseur_id' => (int)$fournisseur['fournisseur_id'],
                    'nombre_carton' => (int)$fournisseur['nombre_carton_fournisseur'],
                ]);
               
            }
            return response()->json([
                'message' => 'Données insérées',
                'palette_id' => $palette->id
            ]);
            
        }
        // Insertion des données de la palette
        
    
        return response()->json(['message' => 'Données insérées avec succès']);
    
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
