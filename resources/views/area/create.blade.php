@extends('layouts.app')

@section('title')
Crear area
@endsection

@section('content')

<div class="md:flex md:justify-center md:gap-10 md:items-center p-5">
    <div class="md:w-6/12 bg-white p-6 rounded-lg shadow-xl">
        <form action="{{route('area.store')}}" method="POST" novalidate>
            @csrf
            <div class="mb-5">
                <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">Nom</label>
                <input id="name" name="name" type="text" placeholder="Nom" class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror" value={{old('name')}}>
                @error('name')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                @enderror
            </div>
            <input type="submit" value="Crear area" style="background:#00abaa;" class=" hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg" />
        </form>
    </div>
</div>

@endsection
