<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avance extends Model
{

    protected $table = "avances";
    protected $fillable = [
        'fournisseur_id',
        'montant_avance',
        'date_avance',
        'mode_payement',
        'created_at',
        'updated_at'
    ];
    use HasFactory;

    public function fournisseur()
    {
        return $this->belongsTo(Fourniseur::class);

    }

    public function getAvance(){
        return Avance::with('fournisseur')->get();
    }

}

