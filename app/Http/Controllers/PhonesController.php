<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Name;

use App\Phone;

use App\Picture;

class PhonesController extends Controller
{
    public function create(Name $name)
    {
        $dob = (new \App\Repositories\Names)->Dob($name->byear, $name->bmonth, $name->bday, $name->note);
        $avatar = (new Picture())->where('avatar', 1)->where('name_id', $name->id)->first();

        return view('phones.create', compact('name', 'dob', 'avatar'));
    }


    public function store(Request $request, Name $name)
    {
        $name->phones()->create($request->all());

        return redirect('/profile/'.$name->id);
    }


    public function edit(Phone $phone)
    {
        $name = $phone->name;
        $dob = (new \App\Repositories\Names)->Dob($phone->name->byear, $phone->name->bmonth, $phone->name->bday, $phone->name->note);
        $avatar = (new Picture())->where('avatar', 1)->where('name_id', $name->id)->first();

        return view('phones.edit', compact('name', 'dob', 'phone', 'avatar'));
    }


    public function update(Phone $phone, Request $request)
    {
        $phone->update($request->all());

        return redirect('/profile/'.$phone->name_id);
    }


    public function destroy(Phone $phone)
    {
        $phone->delete();

      return redirect('/profile/'.$phone->name_id);
    }
}

