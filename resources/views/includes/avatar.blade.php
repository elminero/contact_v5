
    <div style="padding-bottom: 20px">
        @isset($avatar->path_to_file)
            <a href="/picture/{{$avatar->id}}"><img style="display: block; margin: 0 auto" class="img-responsive" src="/pictures/{{$avatar->path_to_file}}_t.jpg" /></a>
        @endisset
        <br />

        <div class="item" style="float: left">
            <h5><a href="/portfolio/{{$name->id}}">View All</a></h5>
        </div>

        <div class="item update" style="float: right">
            <h5><a href="/pictures/create/{{$name->id}}">Add Picture</a></h5>
        </div>

    </div>
