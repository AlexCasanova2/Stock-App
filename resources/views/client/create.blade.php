@extends('layouts.app')

@section('title')
Crear client
@endsection

@section('content')
<h2 class="font-black text-center text-3xl mb-10 capitalize">@yield('title')</h2>

<div>
    <a href="/">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-6" style="display: inline-table">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
        </svg> 
        Tornar a l'inici
    </a>
</div>
<div class="md:flex flex-row md:justify-center md:gap-10 md:items-center p-5">
    <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
        <form action="{{route('client.store')}}" method="POST" novalidate>
            @csrf
            <div class="mb-5">
                <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">Nom</label>
                <input id="name" name="name" type="text" placeholder="Nom" class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror" value={{old('name')}}>
                @error('name')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                @enderror
            </div>
            <input type="submit" value="Crear client" style="background:#00abaa;" class=" hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg" />
        </form>
    </div>
    <div class="md:w-6/12">
        @if ($clients->isEmpty())
<div class="overflow-x-auto">
    <div class="bg-gray-100 flex items-center w-full justify-center font-sans overflow-hidden">
        <p>No hi ha clients</p>
    </div>
</div>
            
@endif

@if ($clients)
<div class="overflow-x-auto">
    <div class="bg-gray-100 flex items-center w-full justify-center font-sans overflow-hidden">
        <div class="md:w-11/12 rounded-lg">
            <div class="bg-white shadow-md rounded my-6">
                <table class="min-w-max w-full table-auto ">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">Id</th>
                            <th class="py-3 px-6 text-left">Nom</th>
                            <th class="py-3 px-6 text-left">Accions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        @foreach ($clients as $client)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                <div class="flex items-center">
                                    <span class="font-medium">{{$client->id}}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                    <div class="mr-2">
                                        <!--<img class="w-6 h-6 rounded-full" src="https://randomuser.me/api/portraits/men/1.jpg"/>-->
                                    </div>
                                    <span>{{$client->name}}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex item-center justify-center">
                                    <div class="w-4 mr-2 transform hover:text-blue-400 hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                    </div>
                                    <div class="w-4 mr-2 transform hover:text-blue-400 hover:scale-110">
                                        <form method="POST" action="{{route('client.destroy', $client->id)}}">
                                            @method('DELETE')
                                            @csrf
                                            <label style="cursor:pointer;">
                                                <input type="submit" value="one" style="display:none;">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </label>
                                        </form>
                                    </div>
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
    </div>
</div>
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
    $("#close").click(function () {
      $(".notification").css("display", "none");
  });
  </script>


@endsection
