@extends('layouts.master')
@section('contents')

    @include('includes.tags')



    <span style="background-color: #1b6d85;">

        <ol style="float: left" class="breadcrumb">
            <li><a href="/names/list">list</a></li>
            <li><b>Profile</b></li>


        </ol>

        @include('includes.nameBar')

    </span>

    <div style="clear: both"></div>

    <div class="row">

        <section class="col-md-3">
            @include('includes.avatar')
        </section>

        <section class="col-md-3">
            @include('includes.nameDOB')
        </section>

        <section class="col-md-3">
            @include('includes.phoneNumbers')
            @include('includes.email')
            @include('includes.address')
        </section>

        <section class="col-sm-3">
            @include('includes.tagForm')
        </section>

    </div>

@endsection
