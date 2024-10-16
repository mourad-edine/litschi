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
    ];
    use HasFactory;

    public function livraisons()
    {
        return $this->hasMany(Livraison::class);
    }

    public function sous_fournisseurs()
    {
        return $this->hasMany(SousFournisseur::class);
    }

    public function getFournisseur(){
        return Fourniseur::all();
    }
}
