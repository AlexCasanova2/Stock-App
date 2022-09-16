@extends('layouts/app')

@section('title')
BUSCAR: {{$request->name}}
@endsection

@section('content')
<h2 class="font-black text-center text-3xl mb-10 capitalize">Resultats de: {{$request->name}}</h2>
    @if ($elements)
    <div class="overflow-x-auto">
        <div class="bg-gray-100 flex items-center w-full justify-center font-sans overflow-hidden">
            <div class="w-full lg:w-12/12">
                <div class="bg-white shadow-md rounded my-6">
                    <table class="min-w-max w-full table-auto">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">Area</th>
                                <th class="py-3 px-6 text-left">Element</th>
                                <th class="py-3 px-6 text-center">Client</th>
                                <th class="py-3 px-6 text-center">Stock</th>
                                <th class="py-3 px-6 text-center">Accions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                            @foreach ($elements as $element)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="mr-2">
                                        </div>
                                        <span>{{$element->area->name ?? 'No hi ha area'}}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <div class="mr-2">
                                        </div>
                                        <a class="hover:underline capitalize" href="{{route('element.show', $element)}}">
                                            <span>{{$element->name}}</span>
                                        </a>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex items-center justify-center">
                                        @if ($element->client)
                                        <a class="hover:underline" href="{{route('client.show', $element->client->id)}}">{{$element->client->name ?? 'No hi ha client'}}</a>
                                        @else
                                        <span>No hi ha client</span>
                                        @endif
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    @if ($element->stock <= 100)
                                        <span class="bg-red-500 text-white py-1 px-3 rounded-full text-xs">{{$element->stock}}</span>
                                    @endif
                                    @if ($element->stock > 100)
                                        <span class="bg-green-500 text-white py-1 px-3 rounded-full text-xs">{{$element->stock}}</span>
                                    @endif
                                    
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex item-center justify-center">
                                        <div class="w-4 mr-2 transform hover:text-blue-400 hover:scale-110">
                                            <a href="{{route('element.show', $element)}}">
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
                                        <div class="w-4 mr-2 transform hover:text-blue-400 hover:scale-110" id="delete">
                                            <a href="{{route('element.setDraft', $element)}}" value="one" ><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="cursor: pointer;">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg></a>
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
    
    @endif
    @if ($elements == '[]')
    <p>No hi ha elements que mostrar</p>
    @endif
@endsection