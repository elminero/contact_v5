@extends('layouts.master')
@section('contents')

    @include('includes.tags')

    <ol class="breadcrumb">
        <li><a href="/names/list">List</a></li>
        <li><a href="/profile/{{$name->id}}" >Profile</a></li>
        <li><b>Portfolio</b></li>
    </ol>

    @include('includes.nameBar')


    <div style="margin-bottom: 40px">
        @foreach($name->pictures as $picture)
            <a style="padding: 5px" href="/picture/{{$picture->id}}"><img src="/pictures/{{$picture->path_to_file}}_t.jpg" /></a>
        @endforeach
    </div>


@endsection



