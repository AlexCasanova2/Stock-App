@extends('layouts.app')

@section('title')
    Registre usuaris
@endsection

@section('content')

<h2 class="font-black text-center text-3xl mb-10 capitalize">@yield('title')</h2>

<div><a href="/">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-6" style="display: inline-table">
        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
      </svg> Tornar a l'inici</a></div>

    <div class="md:flex md:justify-center md:gap-10 md:items-center p-5">
        <!--<div class="md:w-6/12">
            <img src="{{asset('img/registrar.jpg')}}" alt="Registro de usuarios" />
        </div>-->
        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form action="/registro" method="POST" novalidate>
                @csrf
                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">Nom</label>
                    <input id="name" name="name" type="text" placeholder="Nom" class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror" value={{old('name')}}>
                    @error('name')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">Email</label>
                    <input id="email" name="email" type="email" placeholder="Email" class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror" value="{{old('email')}}"/>
                    @error('email')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">Contrasenya</label>
                    <input id="password" name="password" type="password" placeholder="Contrasenya" class="border p-3 w-full rounded-lg @error('password') border-red-500 @enderror" value="{{old('password')}}"/>
                    @error('password')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">Confirmar Contrasenya</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" placeholder="Confirmar contrasenya" class="border p-3 w-full rounded-lg "/>
                </div>
                
                <div class="mb-5">
                    <label for="role" class="mb-2 block uppercase text-gray-500 font-bold">Rol</label>
                    <select name="role" class="border p-3 w-full rounded-lg @error('role') border-red-500 @enderror" {{old('role')}}>
                        @if ($roles->isEmpty())
                            <option value="99">No hi ha rols creats</option>
                        @endif
                        @if ($roles)
                            @foreach ($roles as  $role)
                                <option value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                        @endif
                    </select>                
                </div>
                
                <input type="submit" value="Crear compte" style="background-color:#00abaa;" class="transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"/>
            </form>
        </div>
    </div>
    
@endsection