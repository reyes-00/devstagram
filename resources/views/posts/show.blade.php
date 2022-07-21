@extends('layouts.app')

@section('titulo')
    {{ $post->titulo }}
@endsection

@section('contenido')
    <div class="container mx-auto flex">
        <div class="md:w-1/2">
            <img src="{{ asset('uploads') . '/' . $post->imagen }}" alt="Imagen de {{ $post->titulo }}" srcset="">
            <div class="p-3">
                0 Likes
            </div>
            <div class="font-bold">
                <p>{{ $post->user->username }}</p>
                <p class="text-sm text-gray-500"> {{ $post->created_at->diffForHumans() }}</p>
                <p class="mt-5">{{ $post->descripcion }}</p>
            </div>

        </div>
        <div class="md:w-1/2 p-5">
            <div class="shadow bg-white p-5 mb-5">
                @auth
                    <p class="text-xl font-bold text-center mb-4">Agrega un comentario</p>

                    <form action="">
                        <div class="mb-5">
                            <label for="descripcion" class="mb-2 block uppercase text-gray-500 font-bold">Agrega
                                Comentario</label>

                            <textarea id="comentario" name="comentario" placeholder="Tu Comentario"
                                class="border p-3 w-full rounded-lg @error('comentario') border-red-500 @enderror"></textarea>
                            @error('comentario')
                                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                            @enderror
                        </div>
                        <input type="submit"
                            class=" bg-sky-600 p-4 w-full hover:bg-sky-800 font-bold text-white rounded-lg cursor-pointer transition-colors"
                            value="Comentar">
                    </form>
                @endauth
            </div>
        </div>
    @endsection
