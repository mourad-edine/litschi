<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaletteFournisseur extends Model
{

    protected $table = "palette_fournisseurs";
    protected $fillable = [
        'fournisseur_id',
        'palette_id',
        'type',
        'nombre_carton',
        'created_at',
        'updated_at'
    ];
    use HasFactory;

    public function palette()
    {
        return $this->belongsTo(Palette::class);
    }

    public function fournisseur()
    {
        return $this->belongsTo(Fourniseur::class);
    }

    public function getPalettefournisseur(){
        return PaletteFournisseur::all();
    }
}
