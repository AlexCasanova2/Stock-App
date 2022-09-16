@extends('layouts/app')

<!-- Creamos el section con el nombre del yield para añadir contenido dinámico en función de la página que estamos visitando -->
@section('title')
Inici
@endsection

@section('content')
    <!-- <div class="container mx-auto">
        <div class="flex items-center justify-center">
            <div class="bg-white shadow-2xl p-6 rounded-2xl border-2 border-gray-50">
                <div class="flex flex-col">
                    <div>
                        <h2 class="font-bold text-gray-600 text-center">Barcelona, España</h2>
                    </div>
                    <div class="my-6">
                        <div class="flex flex-row space-x-4 items-center">
                            <div id="icon">
                                <span>
                                    <svg class="w-20 h-20 fill-stroke text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z">
                                        </path>
                                    </svg>
                                </span>
                            </div>
                            <div id="temp">
                                <h4 class="text-4xl">12&deg;C</h4>
                                <p class="text-xs text-gray-500">Sensación térmica +14&deg;C</p>
                            </div>
                        </div>
                    </div>
                    <div class="w-full place-items-end text-right border-t-2 border-gray-100 mt-2">
                        <a href="#" class="text-indigo-600 text-xs font-medium">Ver más</a>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- CONTENT -->
    @if (auth()->user()->role == 1)
    <div>
        <span style="background-color:#00abaa;" class="text-white py-1 px-3 rounded-full text-xs"><a href="{{route('element.create')}}">Crear element</a></span>
        <span style="background-color:#00abaa;" class="text-white py-1 px-3 rounded-full text-xs"><a href="{{route('area.create')}}">Crear area</a></span>
        <span style="background-color:#00abaa;" class="text-white py-1 px-3 rounded-full text-xs"><a href="{{route('client.create')}}">Crear client</a></span>
        <span style="background-color:#00abaa;" class="text-white py-1 px-3 rounded-full text-xs"><a href="{{route('proveidor.create')}}">Crear proveidor</a></span>
        <span style="background-color:#00abaa;" class="text-white py-1 px-3 rounded-full text-xs"><a href="{{route('register')}}">Crear usuari</a></span>
    </div>
    <!-- FORMULARIO DE BUSQUEDA -->
    
    <div class="items-start w-full justify-start mt-5">
        <form method="get" action="{{route('buscar')}}" novalidate>
            <div class="grid items-start w-full justify-start grid-cols-3 mt-5 gap-5">
                <div>
                    <!-- NOM -->
                    <div class="mb-5">
                        <input name="name" type="text" placeholder="Nom de l'element" class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror" value={{old('name')}}>
                        @error('name')
                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div>
                    <!-- ESTAT -->
                    <div class="mb-5">
                        <select name="estat" class="border p-3 w-full rounded-lg">
                            <option value="all">Tots els estats</option>
                          @foreach ($estats as $estat)
                             <option value="{{$estat->name}}" class="capitalize">{{$estat->name}}</option> 
                          @endforeach
                          
                        </select>
                      </div>
                </div>
                <div>
                    <!-- ORDRE -->
                    <div class="mb-5">
                        <select name="order" class="border p-3 w-full rounded-lg">
                          <option value="asc">ASC</option>
                          <option value="desc">DESC</option>
                        </select>
                      </div>
                </div>
            </div>
            <input type="submit" value="Cerca" style="background:#00abaa;" class=" hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-1/4 p-3 text-white rounded-lg" />
        </form>
    </div>
    @endif
    @if ($elements == '')
    <br>
        <p>No hi ha elements que mostrar</p>
    @endif

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
                                            <!--<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                                 width="24" height="24"
                                                 viewBox="0 0 48 48"
                                                 style=" fill:#000000;">
                                                <path fill="#80deea" d="M24,34C11.1,34,1,29.6,1,24c0-5.6,10.1-10,23-10c12.9,0,23,4.4,23,10C47,29.6,36.9,34,24,34z M24,16	c-12.6,0-21,4.1-21,8c0,3.9,8.4,8,21,8s21-4.1,21-8C45,20.1,36.6,16,24,16z"></path><path fill="#80deea" d="M15.1,44.6c-1,0-1.8-0.2-2.6-0.7C7.6,41.1,8.9,30.2,15.3,19l0,0c3-5.2,6.7-9.6,10.3-12.4c3.9-3,7.4-3.9,9.8-2.5	c2.5,1.4,3.4,4.9,2.8,9.8c-0.6,4.6-2.6,10-5.6,15.2c-3,5.2-6.7,9.6-10.3,12.4C19.7,43.5,17.2,44.6,15.1,44.6z M32.9,5.4	c-1.6,0-3.7,0.9-6,2.7c-3.4,2.7-6.9,6.9-9.8,11.9l0,0c-6.3,10.9-6.9,20.3-3.6,22.2c1.7,1,4.5,0.1,7.6-2.3c3.4-2.7,6.9-6.9,9.8-11.9	c2.9-5,4.8-10.1,5.4-14.4c0.5-4-0.1-6.8-1.8-7.8C34,5.6,33.5,5.4,32.9,5.4z"></path><path fill="#80deea" d="M33,44.6c-5,0-12.2-6.1-17.6-15.6C8.9,17.8,7.6,6.9,12.5,4.1l0,0C17.4,1.3,26.2,7.8,32.7,19	c3,5.2,5,10.6,5.6,15.2c0.7,4.9-0.3,8.3-2.8,9.8C34.7,44.4,33.9,44.6,33,44.6z M13.5,5.8c-3.3,1.9-2.7,11.3,3.6,22.2	c6.3,10.9,14.1,16.1,17.4,14.2c1.7-1,2.3-3.8,1.8-7.8c-0.6-4.3-2.5-9.4-5.4-14.4C24.6,9.1,16.8,3.9,13.5,5.8L13.5,5.8z"></path><circle cx="24" cy="24" r="4" fill="#80deea"></circle>
                                            </svg>-->
                                        </div>
                                        <span>{{$element->area->name ?? 'No hi ha area'}}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <div class="mr-2">
                                            <!--<img class="w-6 h-6 rounded-full" src="https://randomuser.me/api/portraits/men/1.jpg"/>-->
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
                                        <!--<img class="w-6 h-6 rounded-full border-gray-200 border transform hover:scale-125" src="https://randomuser.me/api/portraits/men/1.jpg"/>
                                        <img class="w-6 h-6 rounded-full border-gray-200 border -m-1 transform hover:scale-125" src="https://randomuser.me/api/portraits/women/2.jpg"/>
                                        <img class="w-6 h-6 rounded-full border-gray-200 border -m-1 transform hover:scale-125" src="https://randomuser.me/api/portraits/men/3.jpg"/>
                                        -->
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
                                            <!-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="cursor: pointer;">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>-->
                                            <!-- <form method="POST" action="{{route('element.destroy', $element->id)}}">
                                                @method('DELETE')
                                                @csrf
                                                <label>
                                                    <input type="submit" value="one" style="display:none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="cursor: pointer;">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </label>
                                            </form>-->
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
    
        
    @if (session('mensaje'))
    <div class="shadow-lg rounded-lg bg-white mx-auto m-8 p-4 notification-box notification " style="width: 20%; position: fixed; right: 1%; bottom: 1%;z-index: 99999;">
      <div class="text-sm pb-2">
        {{session('mensaje')}}
        <a id="close" style="cursor:pointer;">
          <span class="float-right">
            <svg
              class="fill-current text-gray-600"
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 24 24"
              width="22"
              height="22"
            >
              <path
                class="heroicon-ui"
                d="M16.24 14.83a1 1 0 0 1-1.41 1.41L12 13.41l-2.83 2.83a1 1 0 0 1-1.41-1.41L10.59 12 7.76 9.17a1 1 0 0 1 1.41-1.41L12 10.59l2.83-2.83a1 1 0 0 1 1.41 1.41L13.41 12l2.83 2.83z"
              />
            </svg>
          </span>
        </a>
      </div>
      <!-- <div class="text-sm text-gray-600  tracking-tight ">
        I will never close automatically. This is a purposely very very long
        description that has many many characters and words.
      </div>-->
    </div>
    @endif
    <script>
        $("#cancelar").click(function () {
            console.log('cancelar');
            $(".notification").css("display", "none");
      });
        $("#delete").click(function () {
            console.log('click');
            $(".notification").css("display", "block");
      });
      $("#close").click(function () {
            console.log('click');
            $(".notification").css("display", "none");
      });
      
    </script>
@endsection