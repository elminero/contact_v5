<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Name;

use Carbon\Carbon;

class NamesController extends Controller
{
    public function create()
    {
        return view('names.create');
    }


    public function store(Request $request)
    {


        $name = new Name();

/*
        // check to see if birth_day and birth_month was entered.
        if (!$request->birth_day || !$request->birth_month) {

            $name->dob = null;
            //dd('A birth day of a birth month was not entered!');
        }

        if ($request->birth_day && $request->birth_month) {
            $dob = $request->birth_day . '-' . $request->birth_month . '-' . $request->birth_year;
            $name->dob = Carbon::createFromFormat('j-m-Y', $dob);
        }


      //  $this->attributes['expireson'] = $value ? Carbon::createFromFormat('d.m.Y', $value)->toDateString() : null
*/

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
        return view('names.show', compact('name'));
    }

}
