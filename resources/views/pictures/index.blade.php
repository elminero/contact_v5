@extends('layouts.master')
@section('contents')

    <ol class="breadcrumb">
        <li><a href="/names/list">List</a></li>
        <li><a href="/profile/{{$name->id}}" >Profile</a></li>
        <li><b>Portfolio</b></li>
    </ol>

    @foreach($name->pictures as $picture)

       <img src="/pictures/{{$picture->path_to_file}}_t.jpg" />

    @endforeach



@endsection