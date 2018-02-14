@extends('layouts.master')
@section('contents')

    <ol class="breadcrumb">
        <li><b>List</b></li>
    </ol>
    <div class="row">
        <section class="col-xs-6">
            <table class="table table-bordered table-hover table-striped table-responsive" >
                <tbody >

                    @foreach($names as $name)
                        <tr class="active" >
                            <td>
                                <a href="/profile/{{$name->id}}">
                                    <div style="float: left;">{{$name->first . " " . $name->middle . " " . $name->last}}</div>
                                    <div style="float: right;">@if ($name->alias)AKA: @endif {{$name->alias}}</div>
                                </a>
                            </td>
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