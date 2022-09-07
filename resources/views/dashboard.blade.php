@extends('layouts/app')

@section('title')
{{$user->name}}
@endsection

@section('content')

<div class="overflow-hidden bg-white shadow sm:rounded-lg">
    <div class="px-4 py-5 sm:px-6">
      <h3 class="text-lg font-medium leading-6 text-gray-900">{{$user->name}}</h3>
      <p class="mt-1 max-w-2xl text-sm text-gray-500"></p>
    </div>
    <div class="border-t border-gray-200">
      <dl>
        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">Nom</dt>
          <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$user->name}}</dd>
        </div>
        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">Email</dt>
          <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$user->email}}</dd>
        </div>
        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">Rol</dt>
          <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
            @if ($user->role == 1)
              Admin
            @endif
            @if ($user->role == 2)
              User
            @endif
          </dd>
        </div>
        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">Contrasenya</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">*****************</dd>
          </div>
      </dl>
    </div>
</div>

<section class="container mx-auto mt-10">
    <h2 class="text-4xl text-center font-black my-10">Elements creats</h2>
    @foreach ($elements as $elem)
    <div class="overflow-hidden bg-white shadow sm:rounded-lg">
        <div class="border-t border-gray-200">
          <dl>
            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">Nom</dt>
              <a href="/element/{{$elem->id}}" class="hover:underline"><dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$elem->name}}</dd></a>
            </div>
          </dl>
        </div>
    </div>
    @endforeach
</section>

@endsection