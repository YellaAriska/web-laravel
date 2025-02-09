<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index() 
    {
        return view('register.index', [
            'title' => 'Register',
            'active' => 'register'
        ]);
    }
    public function store(Request $request) 
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255'
        ]);
        // menggunakan | ataupun array [] memiliki fungsi yang sama hanya format yang berbeda
        // unique:users digunakan untuk mencocokan ke table users apakah ada yang sam atau tidak

        // $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['password'] = Hash::make($validatedData['password']);
        // memiliki fungsi yang sama dengan bcrypt

        User::create($validatedData);

        // session()->flash('success', 'Registration successfull! Please login');
        // digantikan oleh fungsi with di bawah
        
        return redirect('/login')->with('success', 'Registration successfull! Please login');
    }
}
