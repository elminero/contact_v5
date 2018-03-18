@extends('layouts.master')
@section('contents')

    <div style="margin-top: -15px">
        Tags:
        @foreach($name->tags as $tag)
            {{$tag->name}}
        @endforeach
    </div>

    <div style="clear: both"></div>

    <ol class="breadcrumb">
        <li><a href="/names/list">list</a></li>
        <li><b>Profile</b></li>
    </ol>

    @include('includes.nameBar')

    <div class="row">

        <section class="col-sm-2">
            @include('includes.avatar')
        </section>

        <section class="col-sm-3">
            @include('includes.nameDOB')
        </section>

        <section class="col-sm-3">
            @include('includes.phoneNumbers')
            @include('includes.email')
            @include('includes.address')
        </section>

        <section class="col-sm-3">
            @include('includes.tagForm')
        </section>

    </div>

@endsection
