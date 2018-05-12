<div style="margin-top: -15px">
    <section class="col-lg-10">
        Tags:
        @foreach($name->tags as $tag)
            <a class="btn-primary btn-round" href="/tag/{{$tag->name}}">{{$tag->name}}</a>
        @endforeach
    </section>
</div>
<div style="clear: both"></div>