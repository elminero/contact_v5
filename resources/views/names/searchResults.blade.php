@extends('layouts.master')
@section('contents')

    <ol class="breadcrumb">
        <li><b>Search Results</b></li>
    </ol>
    <div class="row">
        <section class="col-xs-6">

            @if (count($names) === 0)
                    <p>No Results Found</p>
            @endif

            @if (count($names) != 0)
                <table class="table table-bordered table-hover table-striped table-responsive" >
                    <tbody >
                        @foreach($names as $name)
                            <tr class="active" >
                                <td>
                                    <a href="/profile/{{$name->id}}">
                                        <div style="float: left;">{{$name->first . " " . $name->middle . " " . $name->last}}</div>
                                        <div style="float: right;">AKA: {{$name->alias}}</div>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif

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