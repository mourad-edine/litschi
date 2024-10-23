<?php

namespace App\Http\Controllers\palette;

use App\Http\Controllers\Controller;
use App\Models\Palette;
use Illuminate\Http\Request;

class PaletteController extends Controller
{
    public function store_palette(Request $request)
    {
       
        if ($request) {
            $palette = [
                'type' => $request->type,
                'nombre_carton' => (int)$request->nombre_carton,
            ];
            $insert = Palette::create($palette);
            return $insert;

        }
    }

    public function showPalette(){
        $test = new Palette();
        return $test->getPalette();
    }

    public function detailPalette($id){
        $test = Palette::findOrfail($id);
        return $test;
    }

    
}
