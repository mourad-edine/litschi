<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Dechet extends Model
{

    protected $table = "dechets";
    protected $fillable = [
        'nombre_dechet',
    ];
    use HasFactory;

    public function traiter(): HasOne
    {
        return $this->hasOne(Traiter::class);
    }

    public function getDechet(){
        return SousFournisseur::all();
    }
}
