<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

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
        $validatedData['role'] = "user";

        User::create($validatedData);
        return redirect('/auth/login');
    }

    public function login() {
        // $satpamLiaa = DB::table('settings')->where('identity', 'register')->value('status');
        return view('auth.login', [
            'title' => "Login",
            'active' => 'login',
            // 'register' => $satpamLiaa
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
