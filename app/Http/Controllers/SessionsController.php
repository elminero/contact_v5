<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{

    public function destroy()
    {
        auth()->logout();

        return redirect()->home();
    }


    public function create()
    {

        return view('door.login');
    }


    public function store()
    {
        if (!auth()->attempt( ['email'=>request('email'), 'password'=>request('password')] )) {
            return back()->WithErrors(['message'=>'Please check your credentials and try again.']);
        }

      //  $user = (new User())->where('email', request('email'))->first();

        if (!Auth::user()->role) {
            $name = Auth::user()->name;
            auth()->logout();

            return back()->WithErrors(['message'=>$name .', your account has not yet been approved.']);
        }

        return redirect()->home();
    }

}
