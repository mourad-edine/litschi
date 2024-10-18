<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Palette extends Model
{
    protected $table = "palettes";
    protected $fillable = [
        'numero_palette',
        'type',
        'nombre_carton',
        'created_at',
        'updated_at'
    ];
    use HasFactory;

    public function palette_fournisseurs()
    {
        return $this->hasMany(PaletteFournisseur::class , 'palette_id');
    }

    public function getAvance(){
        return Avance::with('fournisseur')->get();
    }
    use HasFactory;
}
