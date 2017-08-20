@extends('layouts.master')
@section('contents')
<ol class="breadcrumb">
    <li><a href="listcontacts.php">list</a></li>
    <li><b>Profile</b></li>
</ol>
<div class="row">
    <section class="col-sm-6">
        <!-- div 1 Start Avatar -->
        @include('includes.avatar')
    </section>
    <section class="col-sm-6">
        <!-- div 2 Start Name and DOB -->
        @include('includes.nameDOB')
    </section>
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