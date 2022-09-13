@extends('layouts.app')

@section('title')
Proveidor
@endsection

@section('content')
<h2 class="font-black text-center text-3xl mb-10 capitalize">Proveidor: {{$proveidor->name}}</h2>

<div class="overflow-x-auto">
    <div class="bg-gray-100 flex items-center w-full justify-center font-sans overflow-hidden">
        <div class="w-full lg:w-12/12">
            <div class="bg-white shadow-md rounded my-6">
                <table class="min-w-max w-full table-auto">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">Element</th>
                            <th class="py-3 px-6 text-left">Stock</th>
                            <th class="py-3 px-6 text-left">Accions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        @foreach ($elements as $element)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                <div class="flex items-center">
                                    <a href="{{route('element.show', $element)}}">
                                        <span class="font-medium hover:underline">{{$element->name ?? 'No hi ha nom'}}</span>
                                    </a>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left">
                                @if ($proveidor->stock <= 100)
                                    <span class="bg-red-500 text-white py-1 px-3 rounded-full text-xs">{{$element->stock}}</span>
                                @endif
                                @if ($proveidor->stock > 100)
                                    <span class="bg-green-500 text-white py-1 px-3 rounded-full text-xs">{{$element->stock}}</span>
                                @endif
                            </td>
                            <td class="py-3 px-6 text-left">
                                <div class="flex item-left justify-left">
                                    <div class="w-4 mr-2 transform hover:text-blue-400 hover:scale-110">
                                        <a href="{{route('proveidor.show', $proveidor)}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </a>
                                    </div>
                                    @if (auth()->user()->role == 1)
                                    <div class="w-4 mr-2 transform hover:text-blue-400 hover:scale-110">
                                        <a href="{{route('element.edit', $element->id)}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                        </a>
                                    </div>
                                    
                                    <div class="w-4 mr-2 transform hover:text-blue-400 hover:scale-110" >
                                        <form method="POST" action="{{route('element.destroy', $element->id)}}">
                                            @method('DELETE')
                                            @csrf
                                            <label>
                                                <input type="submit" value="one" style="display:none;">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="cursor:pointer;">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </label>
                                        </form>
                                    </div>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection