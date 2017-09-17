<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Name;

use Carbon\Carbon;

class NamesController extends Controller
{

    public function index()
    {
        $names = new Name();
        $names = $names->all();

        return view('names.index', compact('names'));
    }





    public function create()
    {
        return view('names.create');
    }


    public function store(Request $request)
    {
        $name = new Name();

        $name->byear = $request->byear;
        $name->bmonth = $request->bmonth;
        $name->bday = $request->bday;

        $name->last = $request->last;
        $name->first = $request->first;
        $name->middle = $request->middle;
        $name->alias = $request->alias;
        $name->note = $request->note;
        $name->save();
        $id = $name->id;

        return redirect('/profile/'.$id);
    }


    public function show(Name $name)
    {
        $dob = (new \App\Repositories\Names)->Dob($name->byear, $name->bmonth, $name->bday, $name->note);

        return view('names.show', compact('name', 'dob'));
    }


    public function edit(Name $name)
    {
        $dob = (new \App\Repositories\Names)->Dob($name->byear, $name->bmonth, $name->bday, $name->note);

        return view('names.edit', compact('name', 'dob'));
    }


    public function update(Request $request, Name $name)
    {
        $name->update($request->all());

        return redirect('/profile/'.$name->id);
    }


    public function destroy(Name $name)
    {
        $name->delete();

        return redirect('/names/list');
    }

}
