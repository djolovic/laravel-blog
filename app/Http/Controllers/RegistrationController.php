<?php

namespace App\Http\Controllers;


namespace App\Http\Controllers;
use App\User;
// use App\Mail\Welcome;


class RegistrationController extends Controller
{
    public function create(){

        return view('registration.create');

    }

    public function store(){

        //Validate the form

        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);
        //create and save the user
        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ]);

        // Sign him in
        //\Auth::login();

        auth()->login($user);
 /*

        \Mail::to($user)->send(new Welcome($user));


        session()->flash('message', 'Thanks for signing up!');

*/
        // Redirect to home page

        return redirect()->home();

    }
}
