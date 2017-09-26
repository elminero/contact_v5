<div style="padding-top: 15px; padding-bottom: 15px">
    <h3><a href="/addresses/create/{{$name->id}}">Address</a></h3>


            <?php $i = 0; ?>
            @foreach($name->addresses as $address)
                    <?php $i++ ?>
                <a style="color: white" href="/addresses/edit/{{$address->id}}">
                    {{$address->street}}<br />
                    {{$address->city}}, {{$address->state}} {{$address->postal_code}} {{ $address->country }}<br />
                    {{$address->note}}
                </a>


                @if (    $name->addresses->count() > 1  AND $i <   $name->addresses->count() )
                    <hr />
                @endif

            @endforeach
</div>