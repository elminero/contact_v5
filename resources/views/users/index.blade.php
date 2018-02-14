@extends('layouts.master')
@section('contents')

    <ol class="breadcrumb">
        <li><a href="/dashboard">Admin Dashboard</a></li>
        <li><b>Accounts</b></li>
    </ol>

    <div class="row">
        <section class="col-xs-6">
            <table style="background: white; color: black" class="table table-bordered table-hover table-responsive" >
                <tbody>

                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Admin</th>
                    <th>Role</th>
                </tr>

                    @foreach($users as $user)
                        <tr>
                            <td><a href="/users/{{ $user->id  }}">{{ $user->name  }}</a></td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if ($user->is_admin)
                                    Yes
                                @endif
                                @if (!$user->is_admin)
                                    No
                                @endif
                            </td>
                            <td>{{ $user->role }}</td>
                        </tr>
                    @endforeach

                </tbody>

            </table>
            <nav>
                <ol class="pagination pagination-sm">
                    <li class="disabled"><a href="#">&laquo;</a></li>
                    <li class="disabled"><a href="#">1</a></li>
                    <li class="disabled"><a href="#">2</a></li>
                    <li class="disabled"><a href="#">3</a></li>
                    <li class="disabled"><a href="#">&raquo;</a></li>
                </ol>
            </nav>
        </section>
    </div>

@endsection