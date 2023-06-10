<?php

namespace App\Http\Controllers;

use App\Models\TamuUndangan;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class TamuUndanganController extends Controller
{
    public function index() {
        return view('dashboard.undangan.index', [
            'title' => "Tamu Undangan",
            'active' => "tamuUndangan",
            'data' => TamuUndangan::all(),
            'url' => env('APP_URL')
        ])->with('i');
    }

    public function tamuUndanganPost(Request $request) {
        $validatedData = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'instansi' => 'required',
            'perihal' => 'required',
            'waktu' => 'required',
            'nohp' => 'required',
        ]);

        $validatedData['uniqid'] = uniqid();
        $validatedData['hadir'] = 'false';
        TamuUndangan::create($validatedData);
        return back()->with('successPost', "Data Berhasil Di Tambahkan");
    }

    public function tamuUndanganEdit(Request $request, TamuUndangan $TamuUndangan) {
        $validatedData = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'instansi' => 'required',
            'perihal' => 'required',
            'waktu' => 'required',
            'nohp' => 'required',
        ]);

        $validatedData['hadir'] = $request->hadir;
        $TamuUndangan->update($validatedData);
        return back()->with('successEdit', "Data Berhasil Di Perbarui");
    }

    public function tamuUndanganDelete(TamuUndangan $TamuUndangan) {
        $TamuUndangan->delete();
        return back()->with('successDelete', "Data Berhasil Di Hapus");
    }

    public function scanQrCode(TamuUndangan $TamuUndangan) {
        return view('dashboard.undangan.qrcode', [
            'title' => "Scan Undangan",
            'data' => $TamuUndangan,
            'qrcode' => QrCode::size(250)->generate($TamuUndangan->uniqid)
        ]);
    }

    public function scanBarcode() {
        return view('dashboard.undangan.scan', [
            'title' => 'Scan Barcode',
            'active' => 'scanBarcode'
        ]);
    }

    public function scanBarcodePost(Request $request) {
        $uniqid = $request->uniqid;
        TamuUndangan::where('uniqid', $uniqid)->update(['hadir' => 'true']);
        // Bisa di Implementasikan ke TV
        return back()->with('success', "Undangan Berhasil Datang");
    }
}
