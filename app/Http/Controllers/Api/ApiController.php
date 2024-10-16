<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class ApiController extends Controller
{
    public function index(){
        $test = new User();

        return $test->getUser();
    }

    public function store(Request $request){
        if($request){
            $tab = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password
            ];
            $insert = User::create($tab);
            return $insert;
            
        }
    }

    public function detail($id){
        $test = User::with('photos')->findOrFail($id);
        return $test;
    }

    public function update($id){
      
    }
}
