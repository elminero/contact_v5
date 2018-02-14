@extends('layouts.master')
@section('contents')

    <ol class="breadcrumb">

    </ol>

    <div class="row">
        <section class="col-xs-6">

            <form class="form-horizontal" action="/login" method="post"> <!-- type number  note  -->
                {{csrf_field()}}
                <h3>Log In</h3>

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
                    <div class="col-sm-10 col-sm-offset-2">
                        <input class="form-control btn btn-primary"  type="submit" name="signin" value="Sign In" id="signin"/>
                    </div>
                </div>

                @if (count($errors))
                    <div class="form-group">
                        <div class="col-sm-10 col-sm-offset-2">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                        </div>
                    </div>
                @endif

            </form>

        </section>
    </div>



@endsection