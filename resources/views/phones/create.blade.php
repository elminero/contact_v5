@extends('layouts.master')
@section('contents')

    @include('includes.tags')

    <ol class="breadcrumb">
        <li><a href="/names/list">List</a></li>
        <li><a href="/profile/{{$name->id}}" >Profile</a></li>
        <li><b>Add Phone Number</b></li>
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
            <form class="form-horizontal" action="/phones/create/{{$name->id}}" method="post"> <!-- type number  note  -->
                {{csrf_field()}}
                <h3 class="create">Add Phone Number</h3>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="type">Type</label>
                    <div class="col-sm-10">
                        <select name="type" class="form-control" id="type">
                            <option  value="0"> </option>
                            <option  value="1">Business</option>
                            <option  value="2">Home</option>
                            <option  value="3">Fax</option>
                            <option  value="4">Other</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="number">Phone</label>
                    <div class="col-sm-10">
                        <input name="number" type="text" class="form-control" id="number"  value="" /><br />
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
                        <input class="form-control btn btn-primary"  type="submit" name="addPhone" value="Create" id="create"/>
                    </div>
                </div>

                @include('includes.errors')

            </form>
        </section><!--<div class="col-sm-5">-->

    </div><!--<div class="row">-->

@endsection





