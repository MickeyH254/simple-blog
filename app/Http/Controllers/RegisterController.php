<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store() {
        $attr = request()->validate([
            'name' => 'required|max:255',
            'username' => 'required|max:255|unique:users,username',
            'email'=> 'required|email|unique:users,email',
            'password' => 'required|min:8'
        ]);

        $user = User::create($attr);

        auth()->login($user);

        return redirect('/')->with('success', 'Your account has been created');
    }
}
