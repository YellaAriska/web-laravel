<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'title' => 'Login',
            'active' => 'login'
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        // email:dns agar format email yang dimasukkan sesuai, jika diganti hanya dengan email maka penjagaannya akan diturunkan sehingga dpt memasukkan email dg format lain

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            // jika menjalankan kelas auth mealui attempt dari credentials maka kita session akan diregenerate, yang berfungsi untuk menghindari teknik hacking session fixation

            return redirect()->intended('/dashboard');
        }

        return back()->with('loginError', 'Login Failed!');
        
    }

    public function logout()
    {
        Auth::logout();
 
        request()->session()->invalidate();
    
        request()->session()->regenerateToken();
    
        return redirect('/');
    }
}
