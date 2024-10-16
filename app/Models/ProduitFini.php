<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ProduitFini extends Model
{
    protected $table = "produit_finis";
    protected $fillable = [
        'nombre_produit_fini',
    ];
    use HasFactory;

    public function traiter(): HasOne
    {
        return $this->hasOne(Traiter::class);
    }
    public function getProduitFini(){
        return ProduitFini::all();
    }
}
