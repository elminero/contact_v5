<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Name;

use App\Email;

use App\Picture;

class EmailsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Name $name)
    {
        // $dob = (new \App\Repositories\Names)->Dob($name->byear, $name->bmonth, $name->bday, $name->note);
        // $avatar = (new Picture())->where('avatar', 1)->where('name_id', $name->id)->first();

        return view('emails.create', compact('name'));
    }


    public function store(Name $name)
    {
        //$name->emails()->create(request(['type', 'address', 'note',]));
        $name->addEmail(request(['type', 'address', 'note',]));

        return redirect('/profile/'.$name->id);
    }


    public function edit(Email $email)
    {
        $name = $email->name;
        // $dob = (new \App\Repositories\Names)->Dob($email->name->byear, $email->name->bmonth, $email->name->bday, $email->name->note);
        // $avatar = (new Picture())->where('avatar', 1)->where('name_id', $name->id)->first();

        return view('emails.edit', compact('name', 'email'));
    }


    public function update(Email $email)
    {
        $email->update(request(['type', 'address', 'note',]));

        return redirect('/profile/'.$email->name_id);
    }


    public function destroy(Email $email)
    {
        $email->delete();

        return redirect('/profile/'.$email->name_id);
    }











}
