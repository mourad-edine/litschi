<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{

    protected $table = "commandes";
    protected $fillable = [
        'fournisseur_id',
        'evenement_id',
        'quantite_livre',
        'quantite_commande',
        'etat',
        'avance',
        'date_commande'
    ];
    use HasFactory;

    public function evenement()
    {
        return $this->belongsTo(Evenement::class);
    }
    public function fournisseur()
    {
        return $this->belongsTo(Fourniseur::class);
    }

    public function sous_fournisseurs()
    {
        return $this->belongsTo(SousFournisseur::class);
    }
    public function getCommande(){
        return Commande::whereNotIn('etat', ['annulé','livré'])->get();
    }

    public function getCommandeNoLivre(){
        return Commande::wherenotin('etat', ['livré' , 'annulé'])->get();
    }

    public function getCommandeAnnule(){
        return Commande::where('etat', ['annulé'])->get();

    }
    
}
