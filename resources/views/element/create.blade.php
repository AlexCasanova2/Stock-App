@extends('layouts.app')

@section('title')
Crear element
@endsection

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('content')
<h2 class="font-black text-center text-3xl mb-10 capitalize">@yield('title')</h2>

<div><a href="/">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-6" style="display: inline-table">
        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
      </svg> Tornar a l'inici</a></div>
<div class="md:flex md:justify-center md:gap-10 md:items-center p-5">
    <div class="md:w-6/12 bg-white p-6 rounded-lg shadow-xl">
        <form action="{{route('element.store')}}" method="POST" novalidate>
            @csrf
            <!-- NOM -->
            <div class="mb-5">
                <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">Nom</label>
                <input id="name" name="name" type="text" placeholder="Nom" class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror" value={{old('name')}}>
                @error('name')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                @enderror
            </div>
            <!-- DESCRIPCION -->
            <div class="mb-5">
                <label for="description" class="mb-2 block uppercase text-gray-500 font-bold">DescripciĆ³</label>
                <textarea id="description" name="description" placeholder="DescripciĆ³" class="border p-3 w-full rounded-lg @error('description') border-red-500 @enderror">{{old('description')}}</textarea>
                @error('description')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                @enderror
            </div>
            <!-- STOCK -->
            <div class="mb-5">
                <label for="stock" class="mb-2 block uppercase text-gray-500 font-bold">Stock</label>
                <input id="stock" name="stock" type="number" placeholder="Stock" class="border p-3 w-full rounded-lg @error('stock') border-red-500 @enderror" {{old('stock')}} >
                @error('stock')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                @enderror
            </div>
            <!-- CARACTERISTIQUES -->
            <div class="mb-5">
                <label for="caracteristiques" class="mb-2 block uppercase text-gray-500 font-bold">Caracteristiques</label>
                <textarea id="caracteristiques" name="caracteristiques" placeholder="Caracteristiques" class="border p-3 w-full rounded-lg @error('caracteristiques') border-red-500 @enderror">{{old('caracteristiques')}}</textarea>
                @error('caracteristiques')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                @enderror
            </div>
            <!-- TIPUS -->
            <div class="mb-5">
                <label for="tipus" class="mb-2 block uppercase text-gray-500 font-bold">Tipus</label>
                <input id="tipus" name="tipus" type="text" placeholder="Tipus" class="border p-3 w-full rounded-lg @error('tipus') border-red-500 @enderror" value={{old('tipus')}}>
                @error('tipus')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                @enderror
            </div>
            <!-- AMPLE -->
            <!--<div class="mb-5">
                <label for="ample" class="mb-2 block uppercase text-gray-500 font-bold">Ample</label>
                <input id="ample" name="ample" type="number" placeholder="Ample" class="border p-3 w-full rounded-lg @error('ample') border-red-500 @enderror" {{old('ample')}} >
                @error('ample')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                @enderror
            </div>-->
            <!-- LLARG -->
            <!-- <div class="mb-5">
                <label for="llarg" class="mb-2 block uppercase text-gray-500 font-bold">Llarg</label>
                <input id="llarg" name="llarg" type="number" placeholder="Llarg" class="border p-3 w-full rounded-lg @error('llarg') border-red-500 @enderror" {{old('llarg')}} >
                @error('llarg')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                @enderror
            </div>-->
            <!-- ALĆADA -->
            <!-- <div class="mb-5">
                <label for="alĆ§ada" class="mb-2 block uppercase text-gray-500 font-bold">AlĆ§ada</label>
                <input id="alĆ§ada" name="alĆ§ada" type="number" placeholder="AlĆ§ada" class="border p-3 w-full rounded-lg @error('alĆ§ada') border-red-500 @enderror" {{old('alĆ§ada')}} >
                @error('alĆ§ada')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                @enderror
            </div>-->
            <!-- AdquisiciĆ³ -->
            <div class="mb-5">
                <label for="adquisicio" class="mb-2 block uppercase text-gray-500 font-bold">AdquisiciĆ³</label>
                <input id="adquisicio" name="adquisicio" type="date" placeholder="adquisicio" class="border p-3 w-full rounded-lg @error('adquisicio') border-red-500 @enderror" {{old('adquisicio')}} >
                @error('adquisicio')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                @enderror
            </div>
            <!-- AREA -->
            <div class="mb-5">
                <label for="area" class="mb-2 block uppercase text-gray-500 font-bold">Ćrea</label>
                <select name="area" class="border p-3 w-full rounded-lg @error('area') border-red-500 @enderror" {{old('area')}}>
                    @if ($areas->isEmpty())
                        <option value="99">No hi ha areas creades</option>
                    @endif
                    @if ($areas)
                        @foreach ($areas as $area)
                            <option value="{{$area->id}}">{{$area->name}}</option>
                        @endforeach
                    @endif
                </select>
                @error('area')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                @enderror
                
            </div>
            <!-- CLIENT -->
            <div class="mb-5">
                <label for="client" class="mb-2 block uppercase text-gray-500 font-bold">Clients</label>

                <select name="client" class="border p-3 w-full rounded-lg @error('client') border-red-500 @enderror" {{old('client')}}>
                    @if ($clients->isEmpty())
                        <option value="99">No hi ha clients creats</option>
                    @endif
                    @if ($clients)
                        @foreach ($clients as  $client)
                            <option value="{{$client->id}}">{{$client->name}}</option>
                        @endforeach
                    @endif
                    
                </select>
                @error('client')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                @enderror
            </div>
            <!-- ESTAT -->
            <!-- <div class="mb-5">
                <label for="estat" class="mb-2 block uppercase text-gray-500 font-bold">Estat</label>
                <select name="estat" class="border p-3 w-full rounded-lg @error('estat') border-red-500 @enderror" {{old('estat')}}>
                    @if ($estats->isEmpty())
                        <option value="99">No hi ha estats creats</option>
                    @endif
                    @if ($estats)
                        @foreach ($estats as  $estat)
                            <option value="{{$estat->name}}">{{$estat->name}}</option>
                        @endforeach
                    @endif
                    
                </select>
                @error('estat')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                @enderror
            </div>-->
            <!-- PROVEIDOR -->
            <div class="mb-5">
                <label for="proveidor" class="mb-2 block uppercase text-gray-500 font-bold">ProveĆÆdor</label>
                <select name="proveidor" class="border p-3 w-full rounded-lg @error('proveidor') border-red-500 @enderror" {{old('proveidor')}}>
                    @if ($proveidors->isEmpty())
                        <option value="99">No hi ha proveidors creats</option>
                    @endif
                    @if ($proveidors)
                        @foreach ($proveidors as $proveidor)
                            <option value="{{$proveidor->id}}">{{$proveidor->name}}</option>
                        @endforeach
                    @endif
                    
                </select>
                @error('proveidor')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-5">
                <input name="imagen" type="hidden" value="{{old('imagen')}}"/>
                @error('imagen')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                @enderror
            </div>
            <input type="submit" value="Crear element" style="background:#00abaa;" class=" hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg" />
        </form>
        <!-- IMATGE -->
        <div class="mb-5 mt-5">
            <label class="mb-2 block uppercase text-gray-500 font-bold">IMATGE</label>
            <form action="{{route('imagenes.store')}}" method="POST" enctype="multipart/form-data" id="dropzone" class="dropzone border-dashed border-2 w-full h-30 rounded flex flex-col justify-center items-center">
                @csrf
            </form>
        </div>
    </div>
</div>

@endsection
