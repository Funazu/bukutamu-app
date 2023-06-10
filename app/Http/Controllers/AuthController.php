<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register() {
        return view('auth.register', [
            'title' => "Register",
            'active' => 'register'
        ]);
    }

    public function registerPost(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required',
            'username' => 'required',
            'password' => 'required' 
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);
        return redirect('/auth/login');
    }

    public function login() {
        return view('auth.login', [
            'title' => "Login",
            'active' => 'login'
        ]);
    }

    public function loginPost(Request $request) {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->with('loginError', 'Gagal Login');
    }

    public function changepassword(Request $request, User $user) {
        $credentials = $request->validate([
            'password' => 'required'
        ]);

        $credentials['password'] = Hash::make($credentials['password']);
        $user->update($credentials);
        return redirect('/auth/logout');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
