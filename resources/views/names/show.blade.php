@extends('layouts.master')
@section('contents')

    <ol style="margin-bottom: 0" class="breadcrumb">
        <li><a href="/names/list">list</a></li>
        <li><b>Profile</b></li>
    </ol>

    <h2 align="center" style="margin-top: -30px; margin-bottom: 40px ">
        {{$name->first}} {{$name->middle}} {{$name->last}}
        @if ($name->alias)
            aka:
        @endif
        {{$name->alias}}
    </h2>

    <div class="row">

    <section class="col-sm-2">
        @include('includes.avatar')
    </section>

    <section class="col-sm-3">
        @include('includes.nameDOB')
    </section>

    <section class="col-sm-3">
        @include('includes.address')
    </section>

    <section class="col-sm-3">
        @include('includes.phoneNumbers')
        @include('includes.email')
    </section>

</div>

@endsection
