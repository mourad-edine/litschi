<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livraison extends Model
{
    protected $table = "livraisons";
    protected $fillable = [
        'fournisseur_id',
        'nom_sous_fournisseur',
        'commande_id',
        'quantite',
        'nombre_caissette',
        'date_livraison'
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
        return Livraison::with('fournisseur')->get();
    }

}
