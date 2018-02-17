<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Name;

use App\Address;

use App\Country;

use App\Subdivision;

use App\Picture;


class AddressesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function create(Name $name)
    {
        $dob = (new \App\Repositories\Names)->Dob($name->byear, $name->bmonth, $name->bday, $name->note);
        $avatar = (new Picture())->where('avatar', 1)->where('name_id', $name->id)->first();
        $countries = (new Country)->all();

        return view('addresses.create', compact('name', 'dob', 'countries', 'avatar'));
    }


    public function store(Name $name)
    {
        //$name->addresses()->create( request( ['type', 'country', 'city', 'street', 'postal_code', 'note'] ) );
        $name->addAddress(request(['type', 'country', 'city', 'street', 'postal_code', 'note']));

        return redirect('/profile/'.$name->id);
    }


    public function edit(Address $address)
    {
        $name = $address->name;
        $dob = (new \App\Repositories\Names)->Dob($address->name->byear, $address->name->bmonth, $address->name->bday, $address->name->note);
        $avatar = (new Picture())->where('avatar', 1)->where('name_id', $name->id)->first();
        $subdivisions = (new Subdivision)->where('country_code', $address->country)->pluck("subdivision");
        $country = (new Country)->where('country_code', $address->country)->pluck("country")->first();
        $countries = (new Country)->all();

        return view('addresses.edit', compact('name', 'dob', 'address', 'subdivisions', 'country', 'countries', 'avatar'));
    }


    public function update(Address $address)
    {
        $address->update(request(['type', 'country', 'city', 'street', 'postal_code', 'note']));

        return redirect('/profile/'.$address->name_id);
    }


    public function destroy(Address $address)
    {
        $address->delete();

        return redirect('/profile/'.$address->name_id);
    }

}
