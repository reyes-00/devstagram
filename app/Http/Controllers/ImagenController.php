<?php

namespace App\Http\Controllers;


use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImagenController extends Controller
{
    //
    public function store(Request $request)
    {
        $imagen = $request->file('file');
        // dd($imagen);

        // generamos un id unico 
        $nombreImagen = Str::uuid() . "." . $imagen->extension();

        // usamos intervetion image para guardar la imagen que se queda en memoria

        $imagenServidor = Image::make($imagen);
        $imagenServidor->fit(1000, 1000);

        // Creamos la ruta para guardar la imagen
        $imagenPath = public_path('uploads') . '/' . $nombreImagen;
        $imagenServidor->save($imagenPath);

        return response()->json(['imagen'=> $nombreImagen]);

    }
}
