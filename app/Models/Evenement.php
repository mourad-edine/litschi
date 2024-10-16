<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evenement extends Model
{
    protected $table = "evenements";
    protected $fillable = [
        'nom_evenement',
    ];
    use HasFactory;

    public function getEvenement(){
        return SousFournisseur::all();
    }
}
