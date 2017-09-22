@extends('layouts.master')
@section('title', 'Address')

@section('pagescript')
    <script src="/js/jquery-3.2.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="/js/statedropdown.js"></script>
@endsection

@section('contents')

    <ol class="breadcrumb">
        <li><a href="/names/list">List</a></li>
        <li><a href="/profile/{{$name->id}}" >Profile</a></li>
        <li><b>Add an Address</b></li>
    </ol>

    <div class="row">

        <section class="col-sm-6">
            <section class="col-sm-6">
                <!-- div 1 Start Avatar -->
                @include('includes.avatar')
            </section>
        </section>
        <section class="col-sm-6">

            <form class="form-horizontal" action="/addresses/create/{{$name->id}}" method="post"><!-- type country state street postal_code note -->

                {{csrf_field()}}

                <h3 id="rude">Add Address</h3>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="type">Type</label>
                    <div class="col-sm-10">
                        <select name="type" class="form-control" id="type">
                            <option  value="0" >  </option>
                            <option   value="1" > Current Street </option>
                            <option   value="2" > Current Mailing </option>
                            <option   value="3" > Previous Street </option>
                            <option   value="4" > Previous Mailing </option>
                            <option   value="5" > Current Crash Pad </option>
                            <option   value="6" > Previous Crash Pad </option>
                            <option   value="7" > Other </option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="country">Country</label>
                    <div class="col-sm-10">
                        <select name="country" class="form-control" id="country">
                            <option value= "1"> </option>
                            <option value="US" > United States </option  >
                            <option value="CA" > Canada </option>
                            <option value="MX" > Mexico </option>
                            @foreach($countries as $country)
                                <option value="{{$country->country_code}}" >{{$country->country}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="state">State</label>
                    <div class="col-sm-10">
                        <select name="state" class="form-control" id="state">
                            <option value=""></option>
                            <option value="">Select Country First</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="city">City</label>
                    <div class="col-sm-10">
                        <input name="city" type="text" class="form-control" id="city"  value="" /><br />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="street">Street</label>
                    <div class="col-sm-10">
                        <input name="street" type="text" class="form-control" id="street"  value="" /><br />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="postal_code">Postal Code</label>
                    <div class="col-sm-10">
                        <input name="postal_code" type="text" class="form-control" id="postal_code"  value="" /><br />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="note">Notes</label>
                    <div class="col-sm-10">
                        <textarea name="note" class="form-control" id="note"  ></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        <input class="btn btn-primary form-control"  type="submit" name="addAddress" value="Create" id="create"/>
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