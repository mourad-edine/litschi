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
        $validatedData = $request->validate([
            'type' => 'required|string',
            'nombre_carton' => 'required|integer',
            'fournisseur' => 'required|array',
            'fournisseur.*.fournisseur_id' => 'required|integer',
            'fournisseur.*.nombre_carton_fournisseur' => 'required|integer',
        ]);
    
        // Insertion des données de la palette
        $palette = Palette::FirstOrCreate([
            'type' => $validatedData['type'],
            'nombre_carton' => $validatedData['nombre_carton'],
        ]);
    
        // Insertion des données des fournisseurs associés
        foreach ($validatedData['fournisseur'] as $fournisseur) {
            PaletteFournisseur::create([
                'palette_id' => $palette->id,
                'type' => $validatedData['type'],
                'fournisseur_id' => $fournisseur['fournisseur_id'],
                'nombre_carton' => $fournisseur['nombre_carton_fournisseur'],
            ]);
        }
    
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
