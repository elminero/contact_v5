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


                <form class="form-horizontal" action="/pictures/create/{{$name->id}}" method="post" enctype="multipart/form-data" >

                    {{csrf_field()}}

                    <div class="form-group">
                        <div class="col-sm-10 col-sm-offset-2">
                            <div class="checkbox">
                                <label>
                                    <input name="avatar" type="checkbox" value="" />Avatar
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="file"><span >File</span><span id="error"></span></label>
                        <div class="col-sm-10">
                            <input class="" id="file" name="file" type="file"  />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="caption"><span>Caption</span><span id="error"></span></label>
                        <div class="col-sm-10">
                            <textarea name="caption" class="form-control" id="caption"  ></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-10 col-sm-offset-2">
                            <input class="btn btn-default" type="submit" name="imageUpLoad" value="Upload Image" />
                        </div>
                    </div>

                </form>


        </section><!--<div class="col-sm-5">-->
    </div><!--<div class="row">-->
    <hr/>

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