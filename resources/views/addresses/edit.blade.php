@extends('layouts.master')

@section('pagescript')
    <script src="/js/jquery-3.2.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="/js/statedropdown.js"></script>
@endsection

@section('contents')

    @include('includes.tags')

    <ol class="breadcrumb">
        <li><a href="/names/list">List</a></li>
        <li><a href="/profile/{{$name->id}}" >Profile</a></li>
        <li><b>Update Address</b></li>
    </ol>

    @include('includes.nameBar')

    <div class="row">

        <section class="col-sm-3">
            <!-- div 1 Start Avatar -->
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

            <form class="form-horizontal" action="" method="post">

                {{csrf_field()}}
                {{method_field('PATCH')}}


                <h3 class="update" style="float: left">Update Address</h3>
                    <span style='float: right; margin-bottom: 15px;'>
                        <a class="btn btn-danger" id="delete"
                           href="/addresses/{{$address->id}}/destroy">delete</a>
                    </span>
                <br />
                <div style="clear: both"></div>


                <div class="form-group">
                    <label class="col-sm-2 control-label" for="type">Type</label>
                    <div class="col-sm-10">
                        <select name="type" class="form-control" id="type">
                            <option  value="0" >  </option>
                            <option @if ($address->type == 1) {  selected   } @endif value="1" > Current Street </option>
                            <option @if ($address->type == 2) {  selected   } @endif value="2" > Current Mailing </option>
                            <option @if ($address->type == 3) {  selected   } @endif value="3" > Previous Street </option>
                            <option @if ($address->type == 4) {  selected   } @endif value="4" > Previous Mailing </option>
                            <option @if ($address->type == 5) {  selected   } @endif value="5" > Current Crash Pad </option>
                            <option @if ($address->type == 6) {  selected   } @endif value="6" > Previous Crash Pad </option>
                            <option @if ($address->type == 7) {  selected   } @endif value="7" > Other </option>

                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="country">Country</label>
                    <div class="col-sm-10">
                        <select name="country" class="form-control" id="country">
                            <option value="{{$address->country}}">{{$country}}</option>
                            @if ($address->country != 'US')<option value="US" > United States </option>@endif
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
                            <option value="{{$address->state}}">{{$address->state}}</option>
                            @foreach($subdivisions as $state)
                                <option value="{{$state}}">{{$state}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="city">City</label>
                    <div class="col-sm-10">
                        <input name="city" type="text" class="form-control" id="city"  value="{{$address->city}}" /><br />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="street">Street</label>
                    <div class="col-sm-10">
                        <input name="street" type="text" class="form-control" id="street"  value="{{$address->street}}" /><br />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="postal_code">Postal Code</label>
                    <div class="col-sm-10">
                        <input name="postal_code" type="text" class="form-control" id="postal_code"  value="{{$address->postal_code}}" /><br />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="note">Notes</label>
                    <div class="col-sm-10">
                        <textarea name="note" class="form-control" id="note">{{$address->note}}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        <input class="btn btn-primary form-control"  type="submit" name="addAddress" value="Update" id="update"/>
                    </div>
                </div>

                @include('includes.errors')

            </form>

        </section><!--<div class="col-sm-5">-->
    </div><!--<div class="row">-->

@endsection
