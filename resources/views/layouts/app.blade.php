<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @stack('styles')
        <title>TandemStock - @yield('title')</title>
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
    </head>
    <body class="antialiased bg-gray-100">
        <header class="p-5 border-b bg-white shadow">
            <div class="container mx-auto flex justify-between items-center">
                <h1 class="text-3xl font-black"><a href="/">TandemStock</a></h1>
                @auth
                <nav class="flex gap-2 items-center">
                    <!-- <a href="{{route('post.create')}}" class="flex items-center gap-2 bg-white border p-2 text-gray-600 rounded text-sm uppercase font-bold cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                          </svg>
                        Crear
                    </a>-->
                    <a class="font-bold text-gray-600 text-sm" href="{{route('post.index', auth()->user()->name)}}">Hola: <span class="font-normal">{{auth()->user()->name}}</span></a>
                    <form method="POST" action="{{route('logout')}}">
                        @csrf
                        <button type="submit" class="font-bold uppercase text-gray-600 text-sm underline">Tanca sessió</button>
                    </form>
                </nav>
                @endauth

                @guest
                <nav class="flex gap-2">
                    <a class="font-bold uppercase text-gray-600 text-sm" href="{{route('login')}}">Inicia sessió</a>
                    <a class="font-bold uppercase text-gray-600 text-sm" href="{{route('register')}}">Registre</a>
                </nav>
                @endguest  
                
            </div>
        </header>
        
        <main class="container mx-auto mt-10">
            <h2 class="font-black text-center text-3xl mb-10 capitalize">@yield('title')</h2>
            @yield('content')
        </main>
        <footer class="mt-10 text-center p-5 uppercase text-gray-800 font-bold">
            TandemStock - Todos los derechos reservados {{now()->year}}
        </footer>
    </body>
</html>
