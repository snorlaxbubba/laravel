<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;



class AdminUserController extends Controller
{
    public function create() {
        return view('admin.user.create');
    }

    public function store() {
        $attributes = request()->validate([
            'name' => 'required',
            'email' => ['required','email', 'unique:users,email'],
            'password' => ['required','min:8', 'confirmed'],
        ]);
        User::create($attributes);

        session()->flash('success', 'User created successfully');   

        return redirect('/admin');
    }

}

