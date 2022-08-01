<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;



class PerfilController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(User $user)
    {
    
        if(auth()->user()->id === $user->id){

            return view('perfil.index',['user'=>$user]);
        }else{
            return redirect()->route('perfil.index',auth()->user()->username);
            
        }
    }
    public function store(Request $request)
    {
         $request->request->add(['username' => Str::slug($request->username)]);

        $this->validate($request,[
            'username'=>['required','unique:users,username,'.auth()->user()
            ->id,'min:3','max:20', 'not_in:editar-perfil'],
            'email'=>['required','unique:users,email,'.auth()->user()->id],
           
        ]);

        // dd($request->oldpassword );
        if($request->imagen){
            
            $imagen = $request->file('imagen');
            $nombreImagen = Str::uuid() . "." . $imagen->extension();
            $imagenServidor = Image::make($imagen);
            $imagenServidor->fit(1000,1000);
            $imagenPath = public_path('perfiles'. '/' . $nombreImagen);
            $imagenServidor->save($imagenPath);
        }

        $usuario = User::find(auth()->user()->id);
        $usuario->username = $request->username;
        $usuario->email = $request->email;
        $usuario->imagen = $nombreImagen ?? auth()->user()->imagen ?? '';
        if (! Hash::check($request->password, $request->user()->password)) {
        return back()->withErrors([
        'password' => ['TLa contraseña proporcionada no coincide con nuestros registros.']
        ]);
    }
        $usuario->save();

        return redirect()->route('posts.index',$usuario->username);
    }
}
