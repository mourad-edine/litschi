<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{

    protected $table = "commandes";
    protected $fillable = [
        'evenement_id',
        'quantite_livre',
        'quantite_commande',
        'etat',
        'avance',
    ];
    use HasFactory;

    public function evenement()
    {
        return $this->belongsTo(Evenement::class);
    }
    public function fournisseurs()
    {
        return $this->belongsToMany(Fourniseur::class);
    }

    public function sous_fournisseurs()
    {
        return $this->belongsToMany(SousFournisseur::class);
    }

    public function getCommande(){
        return Commande::all();
    }






    
}
