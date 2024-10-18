<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Palette extends Model
{
    protected $table = "palettes";
    protected $fillable = [
        'type',
        'nombre_carton',
    ];
    use HasFactory;

    public function palette_fournisseurs()
    {
        return $this->hasMany(PaletteFournisseur::class , 'palette_id');
    }

    public function getPalette(){
        return Palette::with('palette_fournisseurs')->get();
    }
    use HasFactory;
}
