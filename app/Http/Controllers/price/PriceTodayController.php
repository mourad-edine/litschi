<?php

namespace App\Http\Controllers\price;

use App\Http\Controllers\Controller;
use App\Models\TodayPrice;
use Illuminate\Http\Request;

class PriceTodayController extends Controller
{
    public function store_price(Request $request)
    {
        if ($request) {
            $var = [
                'prix' => (int)$request->prix,
                'date_today' => $request->date_today,

            ];
            $insert = TodayPrice::firstOrCreate($var);
            return $insert;

        }
    }

    public function Show_lastIdprice(){
        $lastItem = TodayPrice::orderBy('id', 'desc')->first();
        return $lastItem;
    }
}
