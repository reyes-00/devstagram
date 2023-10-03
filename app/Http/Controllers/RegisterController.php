<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // Modificar el request
        $request->request->add(['username' => Str::slug($request->username)]);

        // Validar 
        $this->validate($request,[
            'name'=>'required|min:5',
            'username'=>'required|unique:users|min:3|max:20',
            'email'=>'required|unique:users|email|max:60',
            'password'=>'required|confirmed|min:5'
        ]);

        $usuario = User::create([
            'name'=>$request->name,
            'username'=> $request->username,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);

        // Autentoicar un usuario al momento de registrarse
        auth()->attempt([
            'email'=> $request->email,
            'password'=>$request->password,
        ]);

        // Otra forma de autenticar 
        // auth()->attempt($request->only('email','password'));
        
        

        return redirect()->route('posts.index',[$usuario->username]);
    }
}
