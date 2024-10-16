<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SousFournisseur extends Model
{
    use HasFactory;
    protected $table = "sous_fournisseurs";
    protected $fillable = [
        'fournisseur_id',
        'nom_sous_fournisseur',
        'adresse',
        'contact'
    ];

    public function fournisseur()
    {
        return $this->belongsTo(Fourniseur::class);
    }

    public function livraisons()
    {
        return $this->hasMany(Livraison::class);
    }
    public function getSousFournisseur(){
        return SousFournisseur::all();
    }
}
