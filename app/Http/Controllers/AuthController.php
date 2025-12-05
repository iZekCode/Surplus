<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    function login() 
    {
        return view('login');
    }

    public function createSession() 
    {
        session([
            'name' => 'Bernard Santosa',
            'email' => 'bernardsantosa@gmail.com',
            'role' => 'receiver' 
        ]);

        return redirect()->route('login')->with('success', 'Session created!');
    }

    public function readSession()
    {
        return session()->all();
    }

    public function destroySession()
    {
        session()->flush();
        return redirect()->back()->with('success', 'All session cleared!');
    }
}
