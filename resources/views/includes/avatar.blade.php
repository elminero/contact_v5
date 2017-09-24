<div style="width: 175px; padding-bottom: 20px">
    @isset($avatar->path_to_file)
    <a href="/picture/{{$avatar->id}}"><img alt="" src="/pictures/{{$avatar->path_to_file}}_t.jpg" /></a>
    @endisset
    <br />
    <div style="float: left">
        <a href="/portfolio/{{$name->id}}">View All</a>
    </div>
    <div style="float: right">
        <a href="/pictures/create/{{$name->id}}">Add Picture</a>
    </div>
</div>