@extends('layouts.master')
@section('contents')

    <ol style="margin-bottom: 0" class="breadcrumb">
        <li><a href="/dashboard">Admin Dashboard</a></li>
        <li><a href="/users">Accounts</a></li>
        <li><b>Account Update: {{ $user->name }}</b></li>
    </ol>

    <section class="col-sm-6">
        <form class="form-horizontal" action="/users/{{$user->id}}" method="post">

            {{method_field('PATCH')}}

            {{csrf_field()}}

            <h3 style="float: left">Update User</h3>
                <span style='float: right; margin-bottom: 15px;'>
                    <a class="btn btn-danger" id="delete" href="">delete</a>
                </span>
            <br />
            <div style="clear: both"></div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="name">Name<span id="error"></span></label>
                <div class="col-sm-10">
                    <input name="name" type="text" class="form-control" id="name"  value="{{ $user->name }}" /><br />
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="email">eMail<span id="error"></span></label>
                <div class="col-sm-10">
                    <input name="email" type="text" class="form-control" id="email"  value="{{ $user->email }}" /><br />
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="is_admin">Is Admin</label>
                <div class="col-sm-10">

                    <input type="radio" name="is_admin" class="" value="0" @if (!$user->is_admin) checked @endif > No<br>
                    <input type="radio" name="is_admin" class="" value="1" @if ($user->is_admin) checked @endif > Yes<br>

                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="role">Role</label>
                <div class="col-sm-10">
                    <select name="role" class="form-control" id="role">

                        <option value="{{$user->role}}">{{$user->role}}</option>

                        @for ($r = 0; $r <= 9; $r++)
                            <option value="{{$r}}">{{$r}}</option>
                        @endfor

                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-10 col-sm-offset-2">
                    <input class="form-control btn btn-primary"  type="submit" name="addNewContact" value="Update" id="update" />
                </div>
            </div>

        </form>
    </section>

@endsection