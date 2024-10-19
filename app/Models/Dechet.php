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
}
