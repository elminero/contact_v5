@extends('layouts.master')
@section('contents')

    <div style="margin-top: -15px">
        <section class="col-lg-12">
            Tags:
            @foreach($tags as $tag)
                <a class="btn-primary btn-round" href="/tag/{{$tag->name}}">{{$tag->name}}</a>
            @endforeach
        </section>
    </div>
    <div style="clear: both"></div>

    <ol class="breadcrumb">
        <li><b>List</b></li>
    </ol>
    <div class="row">
        <section class="col-xs-8">

            <table class="table table-bordered table-hover table-striped table-responsive" >
                <tbody>
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
                                    {{$name->alias}}
                                </a>
                            </td>

                            <td>
                                <div class="tag">
                                    @foreach( $name->tags as $tag)
                                        <a class="btn-primary btn-round tag" href="/tag/{{$tag->name}}">{{$tag->name}}</a>
                                    @endforeach
                                </div>
                            </td>

                        </tr>
                    @endforeach

                </tbody>
            </table>
                    {{ $names->links() }}
        </section>
    </div>

@endsection