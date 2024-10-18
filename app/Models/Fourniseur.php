<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fourniseur extends Model
{
    protected $table = "fournisseurs";
    protected $fillable = [
        'nom_fournisseur',
        'adresse',
        'contact'
    ];
    use HasFactory;
    
    public function avance()
    {
        return $this->hasOne(Avance::class , 'fournisseur_id');

    }
    public function livraisons()
    {
        return $this->hasMany(Livraison::class);
    }

    public function palette_fournisseurs()
    {
        return $this->hasMany(PaletteFournisseur::class, 'palette_id');
    }


    public function sous_fournisseurs()
    {
        return $this->hasMany(SousFournisseur::class);
    }

    public function commandes()
    {
        return $this->hasMany(Commande::class);
    }

    
    public function dechets()
    {
        return $this->hasMany(Dechet::class);
    }

    public function getFournisseur(){
        return Fourniseur::with('commandes')->get();
    }
}
