<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Traiter extends Model
{
    protected $table = "traiters";
    protected $fillable = [
        'stock_id',
        'dechet_id',
        'produit_fini_id'
    ];
    use HasFactory;


    public function stock(): BelongsTo
    {
        return $this->belongsTo(Stock::class);
    }
    public function dechet(): BelongsTo
    {
        return $this->belongsTo(Dechet::class);
    }

    public function produit_fini(): BelongsTo
    {
        return $this->belongsTo(ProduitFini::class);
    }

    public function getTraiter(){
        return Traiter::all();
    }

    
}
