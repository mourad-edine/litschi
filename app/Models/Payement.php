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
        $test = Payement::with('livraison')->get()->map(function($payement) {
            return [
                'payement_id' => $payement->id,
                'livraison_id' => $payement->livraison_id,
                'fournisseur' => Fourniseur::find($payement->fournisseur_id),
                'montant_paye' =>  $payement->montant_paye,
                'montant_deduise' => $payement->montant_deduise,
                'mode_payement' => $payement->mode_payement,
                'date_payement' => $payement->date_payement,
                'livraison_id' => $payement->livraison->id,
                'livraison_quantite' => $payement->livraison->quantite ,
                'livraison_nombre_caissette' => $payement->livraison->nombre_caissette,
                'date_livraison' => $payement->livraison->date_livraison,
                // Ajoutez d'autres colonnes nécessaires ici
            ];
        });
        
        return $test;
    }
}
