<div style="padding: 20px">
    <h3><a href="/phones/create/{{$name->id}}">Add Phone Number</a></h3>

    @foreach($name->phones as $phone)
        <a href="/phones/edit/{{$phone->id}}">{{$phone->number . " " . $phone->note}}<br /></a>
    @endforeach

</div>