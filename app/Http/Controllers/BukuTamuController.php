<?php

namespace App\Http\Controllers;

use App\Models\BukuTamu;
use Illuminate\Http\Request;

class BukuTamuController extends Controller
{
    public function index() {
        return view('dashboard.bukutamu.index', [
            'title' => 'Buku Tamu',
            'active' => 'bukuTamu',
            'data' => BukuTamu::all()
        ])->with('i');
    }

    public function bukuTamuPost(Request $request) {
        $validatedData = $request->validate([
            'nama' => 'required',
            'asal' => 'required',
            'waktu' => 'required',
            'keterangan' => 'required',
            'kontak' => 'required'
        ]);
        
        $validatedData['uniqid'] = uniqid();

        BukuTamu::create($validatedData);
        return back()->with('successPost', "Data Berhasil Di Tambahkan");
    }

    public function bukuTamuEdit(Request $request, BukuTamu $BukuTamu) {
        $validatedData = $request->validate([
            'nama' => 'required',
            'asal' => 'required',
            'waktu' => 'required',
            'keterangan' => 'required',
            'kontak' => 'required'
        ]);

        $BukuTamu->update($validatedData);
        return back()->with('successEdit', "Data Berhasil Di Update");
    }

    public function bukuTamuDelete(BukuTamu $BukuTamu) {
        $BukuTamu->delete();
        return back()->with("Data Berhasil Di Hapus");
    }
}
