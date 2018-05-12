<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Events\Register;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('door/register');
    }

    
    public function store()
    {
        $this->validate(request(), [
            'name'=>'required|min:3',
            'email'=>'required|email',
            'password'=>'required|min:6|confirmed'
        ]);

        $user = User::create([
            'name'=>request('name'),
            'email'=>request('email'),
            'password'=>bcrypt(request('password'))
        ]);


        event(new Register($user));

     //   auth()->login($user);

        return redirect()->home();

       // return $request->all();
    }
}


