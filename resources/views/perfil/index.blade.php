@extends('layouts.app')

@section('titulo')
    Editar Perfil {{ $user->username }}
@endsection

@section('contenido')
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadow p-6">
            <form action="{{ route('perfil.store', $user) }}" method="post" enctype="multipart/form-data" class="mt-10 m:mt-0">
                @csrf
                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">UserName</label>
                    <input type="text" id="username" name="username" placeholder="Tu Nombre de Usuario"
                        class="border p-3 w-full rounded-lg @error('username') border-red-500 @enderror"
                        value="{{ auth()->user()->username }}">
                    @error('username')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">email</label>
                    <input type="text" id="email" name="email" placeholder="Tu Nombre de Usuario"
                        class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror"
                        value="{{ auth()->user()->email }}">
                    @error('email')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">password</label>
                    <input type="password" id="password" name="password"
                        placeholder="Tu password de Usuario para guardar los cambios"
                        class="border p-3 w-full rounded-lg @error('password') border-red-500 @enderror" value="">
                    @error('password')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="imagen" class="mb-2 block uppercase text-gray-500 font-bold">Foto de Perfil</label>
                    <input type="file" id="imagen" name="imagen"
                        class="border p-3 w-full rounded-lg @error('imagen') border-red-500 @enderror" value=""
                        accept=".jpg, .gif, .jpeg, .png">
                    @error('imagen')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>
                <input type="submit"
                    class=" bg-sky-600 p-4 w-full hover:bg-sky-800 font-bold text-white rounded-lg cursor-pointer transition-colors"
                    value="Guardar Cambios">
            </form>
        </div>
    </div>
@endsection
