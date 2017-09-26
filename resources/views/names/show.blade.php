@extends('layouts.master')
@section('contents')

    <ol class="breadcrumb">
        <li><a href="/names/list">list</a></li>
        <li><b>Profile</b></li>
    </ol>


    <h1 align="center" style="">Robert Ian Farber aka: Robby</h1>

    <div class="row">

        <section class="col-sm-2">
            <!-- div 1 Start Avatar -->
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
