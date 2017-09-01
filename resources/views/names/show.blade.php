@extends('layouts.master')
@section('contents')


<div class="row">
    <section class="col-sm-6">
    <ol class="breadcrumb">
        <li><a href="/names/list">list</a></li>
        <li><b>Profile</b></li>
    </ol>
    </section>

    <section class="col-sm-6" style="float: right">
        <!-- div 2 Start Name and DOB -->
        @include('includes.nameDOB')
    </section>

    <section class="col-sm-6">
        <!-- div 1 Start Avatar -->
        @include('includes.avatar')
    </section>


</div>


    <div class="row">


    </div>
    <hr />
    <!-- Start Phone Numbers -->
    @include('includes.phoneNumbers')
    <hr />
    <!-- Start Email Address  -->
    @include('includes.email')
    <hr />
    <!-- Start Address -->
    @include('includes.address')

@endsection