<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TodayPrice extends Model
{
    use HasFactory;

    protected $table = "today_prices";
    protected $fillable = [
        'prix',
        'date_today'
    ];
}
