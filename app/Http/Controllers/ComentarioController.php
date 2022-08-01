<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comentario;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    //
    public function store(Request $request,User $user,Post $post )
    {
        // validar
        $this->validate($request,[
            'comentario'=>'required|max:255',
        ]);
        // Almacenar el resultado
        Comentario::create([
            'comentario' => $request->comentario,
            'post_id'=>$post->id,
            'user_id'=>auth()->user()->id,
        ]);

        return back()->with('mensaje', 'Comentario Agregado Correctamente');
    }
}
