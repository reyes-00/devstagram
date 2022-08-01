@extends('layouts.app')

@section('titulo')
    Login
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-6/12 p-5">
            <img src="{{ asset('/img/index.jpg') }}" alt="imagen de registro" srcset="">
        </div>
        <div class="md:w-4/12  bg-white p-6 rounded-lg shadow-xl">
            <form method="POST" action="{{ 'login' }}" novalidate>
                @csrf
                @if (@session('mensaje'))
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ session('mensaje') }}</p>
                @endif
                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">Email</label>
                    <input type="email" id="email" name="email" placeholder="Tu Email"
                        class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror"
                        value="{{ old('email') }}">
                    @error('email')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">Password</label>
                    <input type="password" id="password" name="password" placeholder="Tu Password"
                        class="border p-3 w-full rounded-lg">
                    @error('password')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <input type="checkbox" name="remember">
                    <label for="remember" class="text-gray-500 text-sm">Mantener mi sesion</label>
                </div>

                <input type="submit"
                    class=" bg-sky-600 p-4 w-full hover:bg-sky-800 font-bold text-white rounded-lg cursor-pointer transition-colors"
                    value="Inicia Sesion">
            </form>
        </div>
    </div>
@endsection
