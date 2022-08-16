@extends('layouts.app')

@section('title')
{{$element->name}}
@endsection

@section('content')
<div class="md:flex md:justify-center md:gap-10 md:items-center p-5">
    <img style="width:300px;" src="{{asset('uploads') . '/' . $element->imagen}}">
<p>{{$element->name}}</p>
<p>{{$element->description}}</p>
<p>{{$element->stock}}</p>
<p>{{$element->ample}}</p>
</div>

@endsection