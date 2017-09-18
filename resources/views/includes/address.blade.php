


<!-- type', 'country', 'state', 'street', 'postal_code', 'note' -->
<div style="padding: 20px">
    <h3><a href="/addresses/create/{{$name->id}}">Add Address</a></h3>

            @foreach($name->addresses as $address)

            <section class="col-sm-3" style=" color: white">

                <a style="color: white" href="/addresses/edit/{{$address->id}}">
                    {{$address->street}}<br />
                    {{$address->city}}, {{$address->state}} {{$address->postal_code}} US<br />
                    {{$address->note}}
                </a>
            </section>

            @endforeach







</div>



