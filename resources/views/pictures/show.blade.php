@extends('layouts.master')
@section('contents')

    @include('includes.tags')

    <ol class="breadcrumb">
        <li><a href="/names/list">List</a></li>
        <li><a href="/profile/{{$picture->name_id}}" >Profile</a></li>
        <li><b>Picture</b></li>
    </ol>

        @include('includes.nameBar')

    <a href="/portfolio/{{$picture->name_id}}">View All</a>
    <a style="float:right" href="/picture/edit/{{$picture->id}}">Edit</a>
        <div align="center" >
            <nav style="width: 275px">
                <ul class="pager" >
                    <li class="previous" >
                        <a style="background-color: #1b6d85;" href="/picture/{{$pictureUpOne->id}}" ><< Previous</a>
                    </li>
                    <li class="next">
                        <a style="background-color: #1b6d85;" href="/picture/{{$pictureDownOne->id}}" >Next >></a>
                    </li>
                </ul>
            </nav>
        </div>

        <div style="margin-bottom: 40px">
        <a href="/picture/{{$pictureUpOne->id}}" >
            <img style="display: block; margin: 0 auto" class="img-responsive img-rounded" src="/pictures/{{$picture->path_to_file}}.jpg"  />

        </a>
        </div>

        @if($picture->caption)
            <div style="background: white; color: black; padding: 5px;">
                {{$picture->caption}}
            </div>
        @endif

@endsection

