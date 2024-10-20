<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payement extends Model
{
    protected $table = 'payements';
    protected $fillable = [
        'livraison_id',
        'fournisseur_id',
        'prix_jour',
        'montant_paye',
        'montant_deduise',
        'mode_payement',
        'date_payement'
    ];
    use HasFactory;

    public function livraison(){
        return $this->belongsTo(Livraison::class ,'livraison_id');
    }
    public function getPayement(){
        return Payement::with('livraison')->get();
    }
}
