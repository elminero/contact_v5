@extends('layouts.master')
@section('contents')

    <ol class="breadcrumb">
        <li><a href="/names/list">List</a></li>
        <li><a href="" >Profile</a></li>
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

            <form class="form-horizontal"  action="/emails/create/{{$name->id}}" method="post">
                {{csrf_field()}}

                <h3>Add E-Mail Address</h3>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="type">Type</label>
                    <div class="col-sm-10">
                        <select name="type" class="form-control" id="type">
                            <option  value="0"> </option>
                            <option  value="1">Business</option>
                            <option  value="2">Home</option>
                            <option  value="3">Shared</option>
                            <option  value="4">Previous</option>
                            <option  value="5">Other</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="address">E-Mail</label>
                    <div class="col-sm-10">
                        <input name="address" type="text" class="form-control" id="address"  value="" /><br />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="note">Notes</label>
                    <div class="col-sm-10">
                        <textarea name="note" class="form-control" id="note"  ></textarea>
                    </div>
                </div>

                <div style="float: left; color: #990000; margin-top: 10px;">
                </div>

                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        <input class="form-control btn btn-primary"  type="submit" name="addEmail" value="Create" id="create" />
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