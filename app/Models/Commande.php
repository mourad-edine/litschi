<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{

    protected $table = "commandes";
    protected $fillable = [
        'fournisseur_id',
        'nom_sous_fournisseur',
        'quantite_livre',
        'quantite_commande',
        'montant_avance',
        'etat',
        'date_commande'
    ];
    use HasFactory;

    public function fournisseur()
    {
        return $this->belongsTo(Fourniseur::class);
    }

    public function sous_fournisseurs()
    {
        return $this->belongsTo(SousFournisseur::class);
    }
    public function getCommande(){
        return Commande::whereNotIn('etat', ['annulé','livré'])->with('fournisseur')->get();
    }

    public function getCommandeNoLivre(){
        return Commande::wherenotin('etat', ['livré' , 'annulé'])->with('fournisseur')->get();
    }

    public function getCommandeAnnule(){
        return Commande::where('etat', ['annulé'])->get();

    }
    
}
