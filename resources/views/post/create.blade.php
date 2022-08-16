@extends('layouts.app')

@section('title')
Crear publicación
@endsection

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('content')
<div class="md:flex md:items-center">
    <div class="md:w-1/2 px-10">
        <form action="{{route('imagenes.store')}}" method="POST" enctype="multipart/form-data" id="dropzone" class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
            @csrf
        </form>
    </div>
    <div class="md:w-1/2 p-10 bg-white rounded-lg shadow-xl mt-10 md:mt-0">
        <form action="{{route('post.store')}}" method="POST" novalidate>
            @csrf
            <div class="mb-5">
                <label for="nombre" class="mb-2 block uppercase text-gray-500 font-bold">Nombre</label>
                <input id="nombre" name="nombre" type="text" placeholder="Nombre" class="border p-3 w-full rounded-lg @error('nombre') border-red-500 @enderror" value={{old('nombre')}}>
                @error('nombre')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="descripcion" class="mb-2 block uppercase text-gray-500 font-bold">Descripción</label>
                <textarea id="descripcion" name="descripcion" placeholder="Descripción" class="border p-3 w-full rounded-lg @error('descripcion') border-red-500 @enderror">{{old('descripcion')}}</textarea>
                @error('descripcion')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-5">
                <input name="imagen" type="hidden" value="{{old('imagen')}}"/>
                @error('imagen')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                @enderror
            </div>
            <input type="submit" value="Crear artículo" style="background:#00abaa;" class=" hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg" />
        </form>
    </div>
</div>
@endsection