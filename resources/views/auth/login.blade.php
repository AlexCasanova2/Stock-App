@extends('layouts.app')

@section('title')
    Inicia sessió
@endsection

@section('content')
<div class="md:flex md:justify-center"> <img src="{{asset('img/logo-tandem.png')}}" alt="Login tandem" style="width:25%;"/></div>

    <div class="md:flex md:justify-center md:gap-10 md:items-center p-5">
        <!--<div class="md:w-6/12">
            <img src="{{asset('img/login.jpg')}}" alt="Login de usuarios" />
        </div>-->
        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form method="POST" action="{{route('login')}}"  novalidate>
                @csrf
                @if(session('mensaje'))
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{session('mensaje')}}</p>
                @endif
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
                    <input type="checkbox" name="remember"/> <label class="text-gray-500 text-sm">Mantenir sessió oberta</label>
                </div>
                <input type="submit" value="Inicia sessió" style="background-color:#00abaa;" class="transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"/>
            </form>
        </div>
    </div>
@endsection