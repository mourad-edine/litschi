<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livraison extends Model
{
    protected $table = "livraisons";
    protected $fillable = [
        'fournisseur_id',
        'sous_fournisseur_id',
        'commande_id',
        'quantite'
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

    public function factures()
    {
        return $this->hasMany(Facture::class);
    }

    public function getLivraison(){
        return Livraison::all();
    }

}
