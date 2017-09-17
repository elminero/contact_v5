<div style="padding: 20px">
    <h3><a href="/emails/create/{{$name->id}}">Add eMail Address</a></h3>

    @foreach($name->emails as $email)
        <a href="/emails/edit/{{$email->id}}">{{$email->address . " " . $email->note}}<br /></a>
    @endforeach

</div>