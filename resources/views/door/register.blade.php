@extends('layouts.master')
@section('contents')

    <ol class="breadcrumb">

    </ol>

    <div class="row">
        <section class="col-xs-6">

            <form class="form-horizontal" action="/register" method="post"> <!-- type number  note  -->
                {{csrf_field()}}
                <h3>Register</h3>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="email">Name</label>
                    <div class="col-sm-10">
                        <input name="name" type="text" class="form-control" id="name"  value="" /><br />
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-sm-2 control-label" for="email">eMail</label>
                    <div class="col-sm-10">
                        <input name="email" type="text" class="form-control" id="email"  value="" /><br />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="password">Password</label>
                    <div class="col-sm-10">
                        <input name="password" type="password" class="form-control" id="password"  value="" /><br />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="password_confirmation">Password</label>
                    <div class="col-sm-10">
                        <input name="password_confirmation" type="password" class="form-control" id="password_confirmation"  value="" /><br />
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        <input class="form-control btn btn-primary"  type="submit" name="register" value="Register" id="register"/>
                    </div>
                </div>

            </form>

        </section>
    </div>

@endsection