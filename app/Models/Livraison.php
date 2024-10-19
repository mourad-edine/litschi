<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livraison extends Model
{
    protected $table = "livraisons";
    protected $fillable = [
        'commande_id',
        'quantite',
        'nombre_caissette',
        'date_livraison',
        'etat'
    ];
    use HasFactory;

    public function commande()
    {
        return $this->belongsTo(Commande::class);
    }

    public function fournisseur()
    {
        return $this->belongsTo(Fourniseur::class);
    }

    public function getLivraison(){
        $test = Livraison::with('commande.fournisseur')->get()->map(function($livraison) {
            return [
                'livraison_id' => $livraison->id,
                'etat' => $livraison->etat,
                'quantite_livre' => $livraison->quantite,
                'nombre_caissette' =>  $livraison->nombre_caissette,
                'date_livraison' => $livraison->date_livraison,
                'commande_id' => $livraison->commande->id,
                'fournisseur_id' => $livraison->commande->fournisseur->id,
                'nom_fournisseur' => $livraison->commande->fournisseur->nom_fournisseur,
                'nom_sous_fournisseur' => $livraison->commande->fournisseur->nom_sous_fournisseur,
                // Ajoutez d'autres colonnes nécessaires ici
            ];
        });
        
        return $test;
    }

}
