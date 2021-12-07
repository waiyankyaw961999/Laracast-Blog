<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    //
    public function create(){
        return view('sessions.create');
    }
    public function store()
    {
        $attributes = request()->validate([
            
            'username'=>'required', //Ruel::unique('users','username')
            'email'=>'required|email',
            'password'=>'required'
        ]);

        if(!auth()->attempt($attributes)){           
          
            return back()->withInput()->withErrors(['email'=>"Provided Credentials could not be verified"]);

        }
        session()->regenerate();
        return redirect('/')->with('success','Welcome Back!');
    }
    public function destroy(){
        auth()->logout();
        return redirect('/')->with('success','Logout Successfully');
    }
}
