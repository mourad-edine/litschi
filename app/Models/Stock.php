<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Stock extends Model
{
    protected $table = "stocks";
    protected $fillable = [
        'livraison_id',
        'nombre_total',
    ];
    use HasFactory;

    public function traiter(): HasOne
    {
        return $this->hasOne(Traiter::class);
    }

    public function getStock(){
        return Stock::all();
    }
    
}
