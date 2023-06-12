<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(){
        return view('dashboard.setting.index', [
            'title' => "Web Setting",
            'active' => 'setting',
            'features' => Setting::all()
        ])->with('i');
    }

    public function settingEdit(Request $request, Setting $Setting) {
        $validatedData = $request->validate(['status' => 'required']);
        $Setting->update($validatedData);
        return back()->with('successEdit', "Data Berhasil DI Update");
    }
}
