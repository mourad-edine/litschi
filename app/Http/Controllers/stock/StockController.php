<?php

namespace App\Http\Controllers\stock;

use App\Http\Controllers\Controller;
use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function store_stock(Request $request)
    {
        if ($request) {
            $var = [
                'livraison_id' => $request->stock_id,
                'quantite' => $request->dechet_id,
            ];
            $insert = Stock::firstOrCreate($var);
            return $insert;

        }
    }

    public function showStock(){
        $test = new Stock();
        return $test->getStock();
    }

    public function detailStock($id){
        $test = Stock::findOrfail($id);
        return $test;
    }

    public function deleteStock($id){
        $valeur = Stock::findorfail($id);
        if($valeur){
            $valeur->delete();
        }
        return response()->json([
            'message' => 'valeur supprimé avec succès'
        ]);
    }
}
