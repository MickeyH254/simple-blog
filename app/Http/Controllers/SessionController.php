<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create() {
        return view('sessions.create');
    }

    public function store() {
        $attrs = \request()->validate([
            'email'=> 'required|email',
            'password' => 'required'
        ]);

        if (auth()->attempt($attrs)) {
            return redirect('/')->with('success', 'Welcome back '.auth()->user()->username);
        }

        throw ValidationException::withMessages([
            'email' => 'Your provided credentials could not be verified'
        ]);
    }


    public function destroy() {
        auth()->logout();

        return redirect('/')->with('success', 'Successfully logged out');
    }
}
