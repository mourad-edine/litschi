<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $table = "produits";
    protected $fillable = [
        'fournisseur_id',
        'nom_produit',
        'description',
        'prix'
    ];
    use HasFactory;

    public function fournisseur()
    {
        return $this->belongsTo(Fourniseur::class);
    }
    public function getProduit(){
        return Produit::all();
    }
}
