@extends('layouts.master')
@section('contents')

    <ol class="breadcrumb">
        <li><a href="/names/list">List</a></li>
        <li><a href="/profile/{{$name->id}}" >Profile</a></li>
        <li><b>Portfolio</b></li>
    </ol>

    <h2 align="center" style="margin-top: -50px; margin-bottom: 40px ">
        {{$name->first}} {{$name->middle}} {{$name->last}}
        @if ($name->alias)
            aka:
        @endif
        {{$name->alias}}
    </h2>

    @foreach($name->pictures as $picture)
       <a style="padding: 5px" href="/picture/{{$picture->id}}"><img src="/pictures/{{$picture->path_to_file}}_t.jpg" /></a>
    @endforeach

@endsection



