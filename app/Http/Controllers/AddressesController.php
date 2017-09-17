<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Name;

use App\Address;

use App\Country;

use App\Subdivision;


class AddressesController extends Controller
{
    public function create(Name $name)
    {
        $dob = (new \App\Repositories\Names)->Dob($name->byear, $name->bmonth, $name->bday, $name->note);

        $countries = new Country;
        $countries = $countries::all();

        return view('addresses.create', compact('name', 'dob', 'countries'));
    }


    public function store(Request $request, Name $name)
    {
        $name->addresses()->create($request->all());

        return redirect('/profile/'.$name->id);
    }


    public function edit(Address $address)
    {
        $name = $address->name;
        $dob = (new \App\Repositories\Names)->Dob($address->name->byear, $address->name->bmonth, $address->name->bday, $address->name->note);
        $subdivisions = (new Subdivision)->where('country_code', $address->country)->pluck("subdivision");
        $country = (new Country)->where('country_code', $address->country)->pluck("country")->first();

        return view('addresses.edit', compact('name', 'dob', 'address', 'subdivisions', 'country'));
    }


    public function update(Address $address, Request $request)
    {
        $address->update($request->all());

        return redirect('/profile/'.$address->name_id);
    }


    public function destroy(Address $address)
    {
        $address->delete();

        return redirect('/profile/'.$address->name_id);
    }

}
