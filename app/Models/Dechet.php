<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dechet extends Model
{
    protected $table = "dechets";
    protected $fillable = [
        'fournisseur_id',
        'livraison_id',
        'pourcentage_dechet',
    ];

    public function livraison(){
        return $this->belongsTo(Livraison::class);
    }

    public function fournisseur(){
        return $this->belongsTo(Fourniseur::class);
    }

    public function getDechet(){
        return Dechet::with('fournisseur' , 'livraison')->get();
    }
}
