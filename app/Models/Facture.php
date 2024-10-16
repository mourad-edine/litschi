<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    protected $table = "factures";
    protected $fillable = [
        'livraison_id',
    ];
    use HasFactory;

    public function livraison()
    {
        return $this->belongsTo(Livraison::class);
    }

    public function getFacture(){
        return SousFournisseur::all();
    }

}
