@extends('layouts/app')

@section('title')
{{$user->name}}
@endsection

@section('content')

    <div class="flex justify-center">
        <div class="md-full md:w-8/12 log:w-6/12 md:flex">
            <div class="md:w-8/12 lg:w-6/12 px-5">
                <p>Info aquí</p>
            </div>
            <div class="md:w-8/12 lg:w-6/12 px-5">
                
                <p>{{$user->email}}</p>
            </div>
        </div>
    </div>

    <section class="container mx-auto mt-10">
        <h2 class="text-4xl text-center font-black my-10">Elements creats</h2>
        @foreach ($posts as $post)
            <div>
                <a href="#">
                    {{$post->titulo}}
                </a>
            </div>
        @endforeach
    </section>

@endsection