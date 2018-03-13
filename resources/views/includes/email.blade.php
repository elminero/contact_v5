<div class="item">
    <h3><a href="/emails/create/{{$name->id}}">eMail Address</a></h3>
        @foreach($name->emails as $email)
            <a href="/emails/edit/{{$email->id}}">
            <span
                @if (session('emailUpdate') === $email->id)
                class="update"
                @endif

                @if (session('emailCreate') === $email->id)
                class="create"
                @endif
            >
                {{$email->address . " " . $email->note}}
            </span>
            </a><br />
        @endforeach
</div>