<div class="item">
    <h3><a href="/phones/create/{{$name->id}}">Phone Number</a></h3>
        @foreach($name->phones as $phone)
                <a href="/phones/edit/{{$phone->id}}">
                <span
                        @if (session('phoneUpdate') === $phone->id)
                        class="update"
                        @endif

                        @if (session('phoneCreate') === $phone->id)
                        class="create"
                        @endif
                >
                    {{$phone->number . " " . $phone->note}}
                </span>
                    <br />
                </a>
        @endforeach
</div>