<?php

namespace App\Http\Controllers;

use App\Models\BukuTamu;
use App\Models\TamuUndangan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index() {
        return view('dashboard.index', [
            'title' => 'Dashboard',
            'active' => 'dashboard',
            'jumlah_tamu' => BukuTamu::all()->count(),
            'jumlah_tamu_undangan' => TamuUndangan::all()->count()
            // 'qrcode' => QrCode::size(50)->generate("INFO")
        ]);
    }

    public function profile() {
        $user = auth()->user()->id;
        return view('dashboard.profile', [
            'title' => 'Profile',
            'active' => 'profile',
            'data' => User::where('id', $user)->get()
        ]);
    }

    public function makeUser() {
        return view('dashboard.superadmin.makeuser', [
            'title' => "Make User",
            'active' => 'makeUser',
            'users' => User::all()
        ])->with('i');
    }

    public function makeUserPost(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
            'role' => 'required'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']); 
        User::create($validatedData);
        return back()->with('successPost', "User Berhasil DI Buat");
    }

    public function makeUserEdit(Request $request, User $User) {
        $validatedData = $request->validate(['role' => 'required']);
        $User->update($validatedData);
        return back()->with('successEdit', "Data User Berhasil DI Update");
    }

}