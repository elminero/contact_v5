@extends('layouts.master')
@section('contents')

    <ol class="breadcrumb">
        <li><a href="/names/list">List</a></li>
        <li><a href="/profile/{{$name->id}}" >Profile</a></li>
        <li><b>Add Phone Number</b></li>
    </ol>


    <div class="row">

        <section class="col-sm-6">
            <section class="col-sm-6">
                <!-- div 1 Start Avatar -->
                @include('includes.avatar')
            </section>
        </section>
        <section class="col-sm-6">

            <form class="form-horizontal" action="/phones/edit/{{$phone->id}}" method="post">

                {{csrf_field()}}

                <h3 style="float: left">Update Phone Number</h3>
                        <span style='float: right'>
                        <a class="btn btn-danger" id="delete" href="/phones/{{$phone->id}}/destroy">delete</a>
                        </span><br />
                <div style="clear: both"></div>


                <div class="form-group">
                    <label class="col-sm-2 control-label" for="type">Type</label>
                    <div class="col-sm-10">
                        <select name="type" class="form-control" id="type">
                            <option @if ($phone->type == 0) {  selected   } @endif value="0"> </option>
                            <option @if ($phone->type == 1) {  selected   } @endif value="1">Business</option>
                            <option @if ($phone->type == 2) {  selected   } @endif value="2">Home</option>
                            <option @if ($phone->type == 3) {  selected   } @endif value="3">Fax</option>
                            <option @if ($phone->type == 4) {  selected   } @endif value="4">Other</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="number">Phone</label>
                    <div class="col-sm-10">
                        <input name="number" type="text" class="form-control" id="number"  value="{{$phone->number}}" /><br />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="note">Notes</label>
                    <div class="col-sm-10">
                        <textarea name="note" class="form-control" id="note">{{$phone->note}}</textarea>
                    </div>
                </div>


                <div style="float: left; color: #990000; margin-top: 10px;">
                </div>

                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        <input class="form-control btn btn-primary"  type="submit" name="addPhone" value="Update" id="update"/>
                    </div>
                </div>

            </form>

        </section><!--<div class="col-sm-5">-->
    </div><!--<div class="row">-->
    <hr/>
    <!-- array(4) { ["personId"]=> int(37) ["phoneNumber"]=> string(12) "914-331-8584" ["phoneType"]=> int(2) ["note"]=> string(2) "NY" } -->
    <div class="row">
        <!-- div 2 Start Name and DOB -->
        <div class="col-sm-12">
            @include('includes.nameDOB')
        </div>
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