<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class BuscadorController extends Controller
{
    public function index(Request $request){
        $resultado ="";

        $query = $request->input('query');
        $resultado = User::where("username", "LIKE", "%".$query."%" )->get();
        return $resultado;
    }
}
