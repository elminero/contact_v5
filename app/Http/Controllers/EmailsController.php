<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Name;

use App\Email;

use App\Picture;

class EmailsController extends Controller
{
    public function create(Name $name)
    {
        $dob = (new \App\Repositories\Names)->Dob($name->byear, $name->bmonth, $name->bday, $name->note);
        $avatar = (new Picture())->where('avatar', 1)->where('name_id', $name->id)->first();

        return view('emails.create', compact('name', 'dob', 'avatar'));
    }


    public function store(Name $name, Request $request)
    {
        $name->emails()->create($request->all());

        return redirect('/profile/'.$name->id);
    }


    public function edit(Email $email)
    {
        $name = $email->name;
        $dob = (new \App\Repositories\Names)->Dob($email->name->byear, $email->name->bmonth, $email->name->bday, $email->name->note);
        $avatar = (new Picture())->where('avatar', 1)->where('name_id', $name->id)->first();

        return view('emails.edit', compact('name', 'dob', 'email', 'avatar'));
    }


    public function update(Email $email, Request $request)
    {
        $email->update($request->all());

        return redirect('/profile/'.$email->name_id);
    }


    public function destroy(Email $email)
    {
        $email->delete();

        return redirect('/profile/'.$email->name_id);
    }











}
