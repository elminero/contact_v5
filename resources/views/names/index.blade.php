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

                    {{ $names->links()  }}

        </section>
    </div>

@endsection