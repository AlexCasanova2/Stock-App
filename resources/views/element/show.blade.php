@extends('layouts.app')

@section('title')
{{$element->name}}
@endsection

@section('content')
<div class="grid gap-4 grid-cols-2">
  <div>
    <a href="{{url()->previous()}}">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-6" style="display: inline-table">
          <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
      </svg> Tornar</a>
      
  </div>
    <div class="text-right">
      <a href="{{route('element.pdf', $element)}}" target="_blank" style="background:#00abaa;" class="inline-flex w-full justify-center rounded-md border border-transparent px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
      </svg>
      &nbsp;
       Generar PDF</a>
       <a href="{{route('element.edit', $element->id)}}" style="background:#00abaa;" class="inline-flex w-full justify-center rounded-md border border-transparent px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
          <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
        </svg>        
      &nbsp;
       Editar</a>
    </div>
</div>
<br>
<div class="overflow-hidden bg-white shadow sm:rounded-lg">
    <div class="px-4 py-5 sm:px-6">
      <h3 class="text-lg font-medium leading-6 text-gray-900">Informaci?? detallada de l'element: {{$element->name}}</h3>
      <p class="mt-1 max-w-2xl text-sm text-gray-500"></p>
    </div>
    <div class="border-t border-gray-200">
      <dl>
        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">Imatge</dt>
          <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
            @if($element->imagen == null)
              No hi ha cap imatge
            @endif
            @if ($element->imagen)
              <a href="{{asset('uploads') . '/' . $element->imagen}}" target="_blank">
                <img src="{{asset('uploads') . '/' . $element->imagen}}" style="width:150px;height:150px;">
              </a>
            @endif
          </dd>
        </div>
        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">Id</dt>
          <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$element->id}}</dd>
        </div>
        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">Element</dt>
          <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0 capitalize">{{$element->name}}</dd>
        </div>
        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">Descripci??</dt>
          <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0 capitalize">{{$element->description}}</dd>
        </div>
        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">Estat</dt>
          @if ($element->estat == '99')
          <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0"> No hi ha estats creats</dd>
          @else
          <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0 capitalize"> {{$element->estat}}</dd>
          @endif
        </div>
        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">Stock</dt>
          <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$element->stock}}</dd>
        </div>
        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">Caracteristiques</dt>
          <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0 capitalize">{{$element->caracteristiques}}</dd>
        </div>
        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">Tipus</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0 capitalize">{{$element->tipus}}</dd>
        </div>
        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">Adquisici??</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$element->adquisicio->format('d/m/Y')}}</dd>
        </div>
        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">Proveidor</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
              @if(is_null($element->proveidor))
                No hi ha cap client assignat
                @else
                <a class="hover:underline" href="{{route('proveidor.show', $element->proveidor->id)}}">
                  {{$element->proveidor->name ?? 'No hi ha cap client assignat'}}
                </a>
              @endif
            </dd>
        </div>
        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">Area</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$element->area->name ?? 'No hi ha cap area asignada'}}</dd>
        </div>
        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">Client</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
              @if(is_null($element->client))
                No hi ha cap client assignat
                @else
                <a class="hover:underline" href="{{route('client.show', $element->client->id)}}">
                  {{$element->client->name ?? 'No hi ha cap client assignat'}}
                </a>
              @endif
            </dd>
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

<div class="mt-5 mb-4">
  <!--<h3 class="font-medium leading-tight text-2xl mt-5 mb-7">Historial de canvis</h3>-->
  <p class="text-xl font-bold text-center mt-10 mb-7">Historial de canvis</p>
  @foreach($element->revisionHistory as $history )
    <!--<li>{{ $history->userResponsible()->name }} ha canviat {{ $history->fieldName() }} de {{ $history->oldValue() }} a {{ $history->newValue() }}</li>-->

<!-- <div class="p-5 mb-4 bg-gray-50 rounded-lg border border-gray-100">
  <time class="font-semibold text-gray-900 ">{{ date('d/m/Y', strtotime($history->created_at)) }} a les {{date('H:i:s', strtotime($history->created_at))}}</time>
  <ol class="mt-3 divide-y divider-gray-200 ">
      <li>
          <a href="#" class="block items-center p-3 sm:flex hover:bg-gray-100">
              <img class="mr-3 mb-3 w-12 h-12 rounded-full sm:mb-0" src="{{asset('img/user_avatar.png')}}" alt="Jese Leos image">
              <div class="text-gray-600 dark:text-gray-400">
                  <div class="text-base font-normal"><span class="font-medium text-gray-900 ">
                    {{ $history->userResponsible()->name }} ha canviat {{ $history->fieldName() }} de {{ $history->oldValue() }} a {{ $history->newValue() }}
                  </div>-->
                  <!-- <div class="text-sm font-normal">"I wanted to share a webinar zeroheight."</div>-->
                  <!--<span class="inline-flex items-center text-xs font-normal text-gray-500 ">
                    <svg aria-hidden="true" class="mr-1 w-3 h-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.083 9h1.946c.089-1.546.383-2.97.837-4.118A6.004 6.004 0 004.083 9zM10 2a8 8 0 100 16 8 8 0 000-16zm0 2c-.076 0-.232.032-.465.262-.238.234-.497.623-.737 1.182-.389.907-.673 2.142-.766 3.556h3.936c-.093-1.414-.377-2.649-.766-3.556-.24-.56-.5-.948-.737-1.182C10.232 4.032 10.076 4 10 4zm3.971 5c-.089-1.546-.383-2.97-.837-4.118A6.004 6.004 0 0115.917 9h-1.946zm-2.003 2H8.032c.093 1.414.377 2.649.766 3.556.24.56.5.948.737 1.182.233.23.389.262.465.262.076 0 .232-.032.465-.262.238-.234.498-.623.737-1.182.389-.907.673-2.142.766-3.556zm1.166 4.118c.454-1.147.748-2.572.837-4.118h1.946a6.004 6.004 0 01-2.783 4.118zm-6.268 0C6.412 13.97 6.118 12.546 6.03 11H4.083a6.004 6.004 0 002.783 4.118z" clip-rule="evenodd"></path></svg>
                      Public
                  </span> -->
             <!--  </div>
          </a>
      </li>
  </ol>
</div>-->
 
  <ol class="relative border-l border-gray-200">                  
    <li class="mb-2 ml-6">            
        <span class="flex absolute -left-3 justify-center items-center w-6 h-6 bg-blue-200 rounded-full ring-8 ring-white">
            <img class="rounded-full shadow-lg" src="{{asset('img/user_avatar.png')}}" alt="Bonnie image">
        </span>
        <div class="justify-between items-center p-4 bg-white rounded-lg border border-gray-200 shadow-sm sm:flex">
            <time class="mb-1 text-xs font-normal text-gray-400 sm:order-last sm:mb-0">{{ date('d/m/Y', strtotime($history->created_at)) }} a les {{date('H:i:s', strtotime($history->created_at))}}</time>
            <div class="text-sm font-normal text-gray-500 "><a href="/{{$element->user->name}}" class="font-semibold text-blue-600  hover:underline">{{ $history->userResponsible()->name }}</a> ha canviat {{ $history->fieldName() }} de {{ $history->oldValue() }} a <span class="bg-gray-100 text-gray-800 text-xs font-normal mr-2 px-2.5 py-0.5 rounded ">{{ $history->newValue() }}</span></div>
        </div>
    </li>
  </ol>

  @endforeach
</div>
<br>
<div class="md:w-2/2 overflow-hidden">
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