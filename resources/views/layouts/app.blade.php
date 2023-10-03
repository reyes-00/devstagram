<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Devstagram - @yield('titulo')</title>
    @vite('resources/css/app.css')

    {{-- Llama los estilos unicamente en la vista que se vaya a ocupar --}}
    @stack('styles')

    {{-- mandamos a llamar el dropzone --}}
    @vite('resources/js/app.js')
    @livewireStyles
</head>

<body class="bg-gray-100">
    <header class="p-5 border-b bg-white shadow">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ route('home') }}"class="text-3xl font-black">DevStagram</a>
            <form action="">
                <input type="text" placeholder="Buscar Personas" id="buscador" class="border py-2 rounded text-center">
                
                   
              
            </form>
            @auth
                <nav class="flex gap-2 items-center">
                    <a href="{{ route('posts.create') }}"
                        class="flex item-center gap-2 bg-white border p-2 text-gray-600 text-sm cursor-pointer rounded font-bold">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M4 5a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V7a2 2 0 00-2-2h-1.586a1 1 0 01-.707-.293l-1.121-1.121A2 2 0 0011.172 3H8.828a2 2 0 00-1.414.586L6.293 4.707A1 1 0 015.586 5H4zm6 9a3 3 0 100-6 3 3 0 000 6z"
                                clip-rule="evenodd" />
                        </svg>
                        Crear:
                    </a>
                    <a href="{{ route('posts.index', auth()->user()->username) }}"
                        class="font-bold  text-gray-600 text-sm">Hola: <span class="font-normal">
                            {{ auth()->user()->username }}</span></a> </a>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="font-bold uppercase text-gray-600 text-sm">Cerrar
                            Sesion</a>
                    </form>
                </nav>
            @endauth

            @guest
                <nav class="flex gap-2 items-center">
                   
                    <a href="{{ route('login') }}" class="font-bold uppercase text-gray-600 text-sm">Login</a>
                    <a href="{{ route('register') }}" class="font-bold uppercase text-gray-600 text-sm">Crear Cuenta</a>
                </nav>
            @endguest
            
        </div>
        <div id="resultadosBusqueda" class="w-72 mx-auto mt-2"></div>
    </header>
    <main class="container mx-auto mt-10">
        <h2 class="font-black text-center text-3xl mb-10">@yield('titulo')</h2>
        @yield('contenido')
    </main>
    <footer class="mt-10 text-center p-5 text-gray-500 font-bold uppercase">
        DevStagram - Todos los derechos reservados {{ now()->year }}
    </footer>
    @livewireScripts

    <script src="{{ asset('js/buscador.js') }}"></script>
</body>

</html>
