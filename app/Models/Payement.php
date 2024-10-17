<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payement extends Model
{
    protected $table = 'payements';
    protected $fillable = [
        'livraison_id',
        'montant',
        'mode_payement',
        'date_payement'
    ];
    use HasFactory;


    public function getPayement(){
        return Payement::all();
    }
}
