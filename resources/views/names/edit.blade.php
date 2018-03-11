@extends('layouts.master')
@section('contents')

<ol class="breadcrumb">
    <li><a href="/names/list">List</a></li>
    <li><a href="/profile/{{$name->id}}">Profile</a></li>
    <li><b>Update</b></li>
</ol>

@include('includes.nameBar')

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


        <form class="form-horizontal" action="/names/edit/{{$name->id}}" method="post">

            {{method_field('PATCH')}}

            {{csrf_field()}}

            <h3 style="float: left">Update Contact</h3>
            <span style='float: right; margin-bottom: 15px;'>
                <a class="btn btn-danger" id="delete" href="/names/{{$name->id}}/destroy">delete</a>
            </span>
            <br />
            <div style="clear: both"></div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="last">Last<span id="error"></span></label>
                <div class="col-sm-10">
                    <input name="last" type="text" class="form-control" id="last"  value="{{$name->last}}" /><br />
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="first">First<span id="error"></span></label>
                <div class="col-sm-10">
                    <input name="first" type="text" class="form-control" id="first"  value="{{$name->first}}" /><br />
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="middle">Middle<span id="error"></span></label>
                <div class="col-sm-10">
                    <input name="middle" type="text" class="form-control" id="middle"  value="{{$name->middle}}" /><br />
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="alias">Alias<span id="error"></span></label>
                <div class="col-sm-10">
                    <input name="alias" type="text" class="form-control" id="alias"  value="{{$name->alias}}" /><br />
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="bmonth">Month</label>
                <div class="col-sm-10">
                    <select name="bmonth" class="form-control" id="bmonth">
                        <option value="{{$name->bmonth}}"><?php echo  DateTime::createFromFormat('!m',  $name->bmonth)->format('F'); ?></option>

                        <option value="0"> </option>
                        <option value="1">January</option>
                        <option value="2">February</option>
                        <option value="3">March</option>
                        <option value="4">April</option>
                        <option value="5">May</option>
                        <option value="6">June</option>
                        <option value="7">July</option>
                        <option value="8">August</option>
                        <option value="9">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="bday">Day</label>
                <div class="col-sm-10">
                    <select name="bday" class="form-control" id="bday">
                        <option value="{{$name->bday}}">{{$name->bday}}</option>
                        <option value="0"> </option>

                        @for ($m = 0; $m <= 31; $m++)
                            <option value="{{$m}}">{{$m}}</option>
                        @endfor

                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="byear">Year</label>
                <div class="col-sm-10">
                    <select name="byear" class="form-control" id="byear">
                        <option value="{{$name->byear}}">{{$name->byear}}</option>
                        <option value="0"> </option>
                        @for ($y = 2017; $y >= 1907; $y--)
                            <option value="{{$y}}">{{$y}}</option>
                        @endfor
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="note">Notes</label>
                <div class="col-sm-10">
                    <textarea name="note" class="form-control" id="note">{{$name->note}}</textarea>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-10 col-sm-offset-2">
                    <input class="form-control btn btn-primary"  type="submit" name="addNewContact" value="Update" id="update" />
                </div>
            </div>

            @include('includes.errors')

        </form>

    </section><!--<div class="col-sm-5">-->
</div><!--<div class="row">-->

@endsection










