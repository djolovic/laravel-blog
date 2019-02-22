<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{

    public function __construct(){

        //This can be access by everyone except for index and show method.

        $this->middleware('guest', ['except' => 'destroy']);
    }


    public function create(){

        return view ('sessions.create');
    }

    public function store(){

        //Attempt to authenticate the user
        //If not, redirect back

        if(! auth()->attempt(request(['email', 'password']))) {
            return back()->withErrors([
                'message'=> 'Please check your credentials!'

            ]);
        }
        //If so, sign them in
        //Redirect to the home page

        return redirect()->home();

    }

    public function destroy(){

        auth()->logout();

        return redirect()->home();
    }
}
