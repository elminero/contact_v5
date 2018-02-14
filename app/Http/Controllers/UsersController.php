<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        if (Auth::user()->is_admin) {
            $users = new User();
            $users = $users->all();

            return view('users.index', compact('users'));
        }

        return "You don't belong here";
    }


    public function edit(Request $request, User $user)
    {
        if (Auth::user()->is_admin) {

            return view('users.edit', compact('user'));
        }

        return "You don't belong here";
    }


    public function dashboard()
    {
        if (Auth::user()->is_admin) {

            return view('admin.dashboard');
        }

        return "You don't belong here";
    }


    public function update(Request $request, User $user)
    {
        if (Auth::user()->is_admin) {
            $user->update($request->all());

            return redirect('/users');
        }

        return "You don't belong here";
    }


}
