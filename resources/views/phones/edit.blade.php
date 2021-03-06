@extends('layouts.master')
@section('contents')

    @include('includes.tags')

    <ol class="breadcrumb">
        <li><a href="/names/list">List</a></li>
        <li><a href="/profile/{{$name->id}}" >Profile</a></li>
        <li><b>Update Phone Number</b></li>
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

            <form class="form-horizontal" action="/phones/edit/{{$phone->id}}" method="post">
                {{method_field('PATCH')}}
                {{csrf_field()}}

                <h3 class="update" style="float: left">Update Phone Number</h3>
                        <span style='float: right; margin-bottom: 15px;'>
                            <a class="btn btn-danger" id="delete" href="/phones/{{$phone->id}}/destroy">delete</a>
                        </span>
                        <br />
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

                @include('includes.errors')

            </form>

        </section><!--<div class="col-sm-5">-->
    </div><!--<div class="row">-->

@endsection