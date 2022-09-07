@extends('layouts.app')

@section('title')
{{$element->name}}
@endsection

@section('content')
<div class="grid gap-4 grid-cols-2">
  <div>
    <a href="/">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-6" style="display: inline-table">
          <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
      </svg> Tornar a l'inici</a>
  </div>
    <div class="text-right">
      <a href="{{route('element.pdf', $element)}}" style="background:#00abaa;" class="inline-flex w-full justify-center rounded-md border border-transparent px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
      </svg>
      &nbsp;
       Descarregar PDF</a>
    </div>
</div>
<br>
<div class="overflow-hidden bg-white shadow sm:rounded-lg">
    <div class="px-4 py-5 sm:px-6">
      <h3 class="text-lg font-medium leading-6 text-gray-900">Informació detallada de l'element: {{$element->name}}</h3>
      <p class="mt-1 max-w-2xl text-sm text-gray-500"></p>
    </div>
    <div class="border-t border-gray-200">
      <dl>
        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">Id</dt>
          <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$element->id}}</dd>
        </div>
        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">Element</dt>
          <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$element->name}}</dd>
        </div>
        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">Descripció</dt>
          <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$element->description}}</dd>
        </div>
        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">Estat</dt>
          @if ($element->estat == '99')
          <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0"> No hi ha estats creats</dd>
          @else
          <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0"> {{$element->estat}}</dd>
          @endif
        </div>
        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">Stock</dt>
          <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$element->stock}}</dd>
        </div>
        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">Alçada</dt>
          <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$element->alçada}}cm</dd>
        </div>
        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">Amplada</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$element->ample}}cm</dd>
        </div>
        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">Llargada</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$element->llarg}}cm</dd>
        </div>
        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">Adquisició</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$element->adquisicio->format('d/m/Y')}}</dd>
        </div>
        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">Proveidor</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$element->proveidor->name ?? 'No hi ha cap proveidor assignat'}}</dd>
        </div>
        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">Area</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$element->area->name ?? 'No hi ha cap area asignada'}}</dd>
        </div>
        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">Client</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$element->client->name ?? 'No hi ha cap client assignat'}}</dd>
        </div>
        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">Imatge</dt>
          <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
            <ul role="list" class="divide-y divide-gray-200 rounded-md border border-gray-200">
              <li class="flex items-center justify-between py-3 pl-3 pr-4 text-sm">
                <div class="flex w-0 flex-1 items-center">
                  <svg class="h-5 w-5 flex-shrink-0 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M15.621 4.379a3 3 0 00-4.242 0l-7 7a3 3 0 004.241 4.243h.001l.497-.5a.75.75 0 011.064 1.057l-.498.501-.002.002a4.5 4.5 0 01-6.364-6.364l7-7a4.5 4.5 0 016.368 6.36l-3.455 3.553A2.625 2.625 0 119.52 9.52l3.45-3.451a.75.75 0 111.061 1.06l-3.45 3.451a1.125 1.125 0 001.587 1.595l3.454-3.553a3 3 0 000-4.242z" clip-rule="evenodd" />
                  </svg>
                  @if($element->imagen == null)
                    <span class="ml-2 w-0 flex-1 truncate">No hi ha cap imatge</span>
                  @endif
                  <a class="hover:underline" href="{{asset('uploads') . '/' . $element->imagen}}" target="_blank"><span class="ml-2 w-0 flex-1 truncate">{{$element->imagen}}</span></a>
                </div>
                @if ($element->imagen)
                  <div class="ml-4 flex-shrink-0">
                    <a href="{{asset('uploads') . '/' . $element->imagen}}" target="_blank" download class="font-medium text-indigo-600 hover:text-indigo-500">Descarregar</a> | 
                    <a href="{{asset('uploads') . '/' . $element->imagen}}" target="_blank" class="font-medium text-indigo-600 hover:text-indigo-500">Visualitzar</a>
                  </div>
                @endif
              </li>
            </ul>
          </dd>
        </div>
      </dl>
    </div>
</div>
<div class="md:w-2/2 p-5 overflow-hidden">
  <div class="">
      <p class="text-xl font-bold text-center mb-4">Afegeix un comentari</p>
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
      <form action="{{route('comentarios.store', $element)}}" method="POST">
        @csrf
        <div class="mb-5">
          <label for="comentario" class="mb-2 block uppercase text-gray-500 font-bold">Comentari</label>
          <textarea id="comentario" name="comentario" placeholder="Comentari" class="border p-3 w-full rounded-lg @error('comentario') border-red-500 @enderror"></textarea>
          @error('comentario')
              <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
          @enderror
      </div>
      <div class="w-1/5">
        <input type="submit" value="Publicar comentari" style="background:#00abaa;" class=" hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg" />
      </div>
      </form>
      <br>
            <section class="relative flex items-center justify-center antialiased min-w-screen">
              <div class="container px-0 mx-auto sm:px-5">
                @if ($element->comentarios->count())
                  @foreach ($element->comentarios as $comentario)
                  <div
                      class=" mb-2.5 flex-col w-full py-4 mx-auto bg-white border-b-2 border-r-2 border-gray-200 sm:px-4 sm:py-4 md:px-4 sm:rounded-lg sm:shadow-sm md:w-3/3">
                      <div class="flex flex-row">
                          <img class="object-cover w-12 h-12 border-2 border-gray-300 rounded-full" alt="User avatar"
                              src="{{asset('img/user_avatar.png')}}">
                          <div class="flex-col mt-1">
                              <div class="flex items-center flex-1 px-4 font-bold leading-tight capitalize"><a class=" hover:underline" href="/{{$comentario->user->name}}">{{$comentario->user->name}}</a>
                                  <span class="ml-2 text-xs font-normal text-gray-500">{{$comentario->created_at->diffForHumans()}}</span>
                              </div>
                              <div class="flex-1 px-2 ml-2 text-sm font-medium leading-loose text-gray-600">{{$comentario->comentario}}
                              </div>
                              @if (auth()->user()->id == $comentario->user_id)
                              <!--<button class="inline-flex items-center px-1 ml-1 flex-column">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-600">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                </svg>
                                </button>-->
                              @endif
                              <!-- <button class="inline-flex items-center px-1 -ml-1 flex-column">
                                  <svg class="w-5 h-5 text-gray-600 cursor-pointer hover:text-gray-700" fill="none"
                                      stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5">
                                      </path>
                                  </svg>
                              </button>-->
                          </div>
                      </div>
                      <!-- <hr class="my-2 ml-16 border-gray-200">-->
                  </div>
                  @endforeach
                  @else
                    <p class="p-10 text-center">Encara no hi ha cap comentari.</p>
                  @endif
              </div>
          </section>
  </div>
</div>

<script>
  $("#close").click(function () {
    $(".notification").css("display", "none");
});
</script>
@endsection