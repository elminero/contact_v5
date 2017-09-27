@extends('layouts.master')
@section('contents')

    <ol class="breadcrumb">
        <li><a href="/names/list">List</a></li>
        <li><a href="/profile/{{$name->id}}" >Profile</a></li>
        <li><b>Edit Picture</b></li>
    </ol>

    <h2 align="center" style="margin-top: -50px; margin-bottom: 40px ">
        {{$name->first}} {{$name->middle}} {{$name->last}}
        @if ($name->alias)
            aka:
        @endif
        {{$name->alias}}
    </h2>

    <div class="row">

        <section class="col-sm-2">
            <!-- div 1 Start Avatar -->
            @include('includes.avatar')
        </section>

        <section class="col-sm-3">
            @include('includes.nameDOB')
            @include('includes.address')
        </section>

        <section class="col-sm-3">
            @include('includes.phoneNumbers')
            @include('includes.email')
        </section>

        <section class="col-sm-4">


            <h3 style="float: left">Update Picture</h3>
                    <span style='float: right'>
                    <a class="btn btn-danger" id="delete"
                       href="/picture/{{$picture->id}}/destroy">delete</a>
                    </span><br />
            <div style="clear: both"></div>

            <section class="col-sm-offset-4 col-sm-6">
                <img class="img-responsive" src="/pictures/{{$picture->path_to_file}}_t.jpg" />
            </section>



            <form class="form-horizontal" action="/picture/edit/{{$picture->id}}" method="post" enctype="multipart/form-data" >


                {{csrf_field()}}

                {{method_field('PATCH')}}

                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="avatar" value="1"
                                       @if ($picture->avatar == 1)
                                            checked
                                       @endif

                                        /> Avatar
                            </label>
                        </div>
                    </div>
                </div>





                <div class="form-group">
                    <label class="col-sm-2 control-label" for="caption"><span>Caption</span><span id="error"></span></label>
                    <div class="col-sm-10">
                        <textarea name="caption" class="form-control" id="caption">{{$picture->caption}}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        <input class="btn btn-primary form-control" type="submit" name="imageUpLoad" value="Update Picture" />
                    </div>
                </div>

            </form>

        </section><!--<div class="col-sm-5">-->
    </div><!--<div class="row">-->


@endsection