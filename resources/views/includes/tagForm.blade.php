<div class="item">
    <h3>Assign a Tag</h3>

    <form method="post" action="/profile/{{$name->id}}/tag">

        {{csrf_field()}}

        <div class="form-group">
            <label for="tags" id="tags">Select an Existing Tag</label>
            <select name="tag" class="form-control" id="tags">
                @foreach($tags as $tag)
                    @if (!in_array($tag->name, $tagsInUse))
                        <option  value="{{$tag->id}}">{{$tag->name}}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary form-control">Assign an Existing Tag</button>
        </div>
    </form>


    <form method="post" action="/profile/{{$name->id}}/newtag">

        {{csrf_field()}}

        <div class="form-group">
            <label for="name" id="name">New Tag</label>    <span style="float: right">@include('includes.errors')</span>
            <input type="text" name="name" class="form-control">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary form-control">Assign a New Tag</button>
        </div>
    </form>

    <h3>Remove a Tag</h3>
    <form method="post" action="/profile/{{$name->id}}/detach">

        {{csrf_field()}}

        <div class="form-group">
            <label for="tags" id="tags">Select an Existing Tag</label>
            <select name="tag" class="form-control" id="tags">
                @foreach($name->tags as $tag)

                        <option  value="{{$tag->id}}">{{$tag->name}}</option>

                @endforeach
            </select>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary form-control">Detach Tag</button>
        </div>
    </form>





</div>
