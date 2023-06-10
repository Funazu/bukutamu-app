<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BukuTamu;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class TamuController extends Controller
{
    public function index() {
        return view('home.index', [
            'title' => "Form Tamu"
        ]);
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
        return redirect("/tamu/create/success/" . $validatedData['uniqid']);
    }

    public function qrcode(BukuTamu $BukuTamu) {

        return view('home.qrcode', [
            'title' => "Sukses",
            'qrcode' => QrCode::size(250)->generate(env('APP_URL') . "/tamu/" . $BukuTamu->uniqid)
        ]);

        // return response(env('APP_URL') . "/lalalal");
    }

    public function tamu(BukuTamu $BukuTamu) {
        return view('home.tamu', [
            'title' => "Tamu",
            'data' => $BukuTamu
        ]);
    }
}
