<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('pages.login');
    }

    public function register()
    {
        return view('pages.register');
    }

    public function login(Request $request)
    {
        $credential = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credential)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
        return back()->with('LoginError', 'Email or Password is incorrect');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|max:50|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'password' => 'required'
        ]);

        // $validate['password'] = Hash::make($validate['password']);
        $validate['password'] = bcrypt($validate['password']);

        User::create($validate);

        return redirect('/login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
