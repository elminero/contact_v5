<h5 style="float: left">
    Tags:
    @foreach($name->tags as $tag)
        {{$tag->name}}
    @endforeach
</h5>