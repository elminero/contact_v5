@extends('layouts.master')
@section('contents')

    <section class="col-sm-6">
        <form class="form-horizontal" action="/names/create" method="post" name="addContact">

            {{csrf_field()}}

            <h3>Create a New Contact</h3>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="last">Last<span id="error"></span></label>
                <div class="col-sm-10">
                    <input name="last" type="text" class="form-control" id="last"  value="" /><br />
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="first">First<span id="error"></span></label>
                <div class="col-sm-10">
                    <input name="first" type="text" class="form-control" id="first"  value="" /><br />
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="middle">Middle<span id="error"></span></label>
                <div class="col-sm-10">
                    <input name="middle" type="text" class="form-control" id="middle"  value="" /><br />
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="alias">Alias<span id="error"></span></label>
                <div class="col-sm-10">
                    <input name="alias" type="text" class="form-control" id="alias"  value="" /><br />
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="bmonth">Month</label>
                <div class="col-sm-10">
                    <select name="bmonth" class="form-control" id="bmonth">

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

                        <option value=""> </option>

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

                        <option value="0000"> </option>
                        @for ($y = 2017; $y >= 1907; $y--)
                            <option value="{{$y}}">{{$y}}</option>
                        @endfor
                    </select>
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
                    <input class=" form-control btn btn-primary"  type="submit" name="addNewContact" value="Create"
                           id="create"
                            />
                </div>
            </div>

        </form>

    </section>

@endsection