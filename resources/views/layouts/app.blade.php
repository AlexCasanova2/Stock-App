<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @stack('styles')
        <title>TandemStock - @yield('title')</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
    </head>
    <body class="antialiased bg-gray-100">
        <header class="p-5 border-b bg-white shadow">
            <div class="container mx-auto flex justify-between items-center">
                <h1 class="text-3xl font-black"><a href="/">TandemStock<!-- <img src="{{asset('img/logo-tandem.png')}}" alt="Login tandem" style="width:15%;"/>--></a></h1>
                @auth
                <nav class="flex gap-2 items-center" style="align-items:baseline;">
                    <!-- <a href="{{route('post.create')}}" class="flex items-center gap-2 bg-white border p-2 text-gray-600 rounded text-sm uppercase font-bold cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                          </svg>
                        Crear
                    </a>-->
                    <a href="{{route('biblioteca')}}" class="font-bold text-black-600 text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                          </svg>
                          
                    </a>
                    <a href="" class="">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                          </svg>
                          
                    </a>
                    <a class="font-bold text-black-600 text-sm" href="{{route('post.index', auth()->user()->name)}}">
                        <!--Hola: <span class="font-normal">{{auth()->user()->name}}-->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                              </svg>
                              
                              
                        </span></a>
                    <form method="POST" action="{{route('logout')}}">
                        @csrf
                        <button type="submit" class="font-bold uppercase text-black-600 text-sm underline"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                          </svg>
                          </button>
                    </form>
                </nav>
                @endauth

                @guest
                <nav class="flex gap-2">
                    <!-- a class="font-bold uppercase text-gray-600 text-sm" href="{{route('login')}}">Inicia sessió</a>-->
                    <!--<a class="font-bold uppercase text-gray-600 text-sm" href="{{route('register')}}">Registre</a>-->
                </nav>
                @endguest  
                
            </div>
        </header>
        
        <main class="container mx-auto mt-10">
            <!--<h2 class="font-black text-center text-3xl mb-10 capitalize">@yield('title')</h2>-->
            @yield('content')
        </main>
        <footer class="mt-10 text-center p-5 uppercase text-gray-800 font-bold">
            <!-- TandemStock - Todos los derechos reservados {{now()->year}} -->
        </footer>
    </body>
</html>
