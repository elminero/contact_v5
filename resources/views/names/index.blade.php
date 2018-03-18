@extends('layouts.master')
@section('contents')

    <ol class="breadcrumb">
        <li><b>List</b></li>
    </ol>
    <div class="row">
        <section class="col-xs-8">

            <table class="table table-bordered table-hover table-striped table-responsive" >
                <tbody >
                    <th>Name (last, First, Middle)</th><th>AKA</th><th>Tags</th>
                    @foreach($names as $name)
                        <tr class="active" >
                            <td>
                                <a href="/profile/{{$name->id}}">
                                    <div style="float: left;">{{$name->first . " " . $name->middle . " " . $name->last}}</div>
                                </a>
                            </td>

                            <td>
                                <a href="/profile/{{$name->id}}">
                                    @if ($name->alias)AKA: @endif {{$name->alias}}
                                </a>
                            </td>

                            <td>
                                @foreach( $name->tags as $tag)
                                    <a href="/profile/{{$name->id}}"> {{$tag->name}}</a>
                                @endforeach
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>

                    {{ $names->links()  }}

        </section>
    </div>

@endsection