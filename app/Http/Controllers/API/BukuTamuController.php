<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\BukuTamu;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class BukuTamuController extends Controller
{
    public function getAllData() {
        $response = [
            'status' => "OK",
            'results' => BukuTamu::all()
        ];

        return response()->json($response, Response::HTTP_OK);
    }

    public function getDataByUniqid(BukuTamu $bukutamu) {
        $data = BukuTamu::where('uniqid', $bukutamu->uniqid)->first();
        $response = [
            'status' => 'OK',
            'result' => $data
        ];
        
        // return $bukutamu;
        return response()->json($response, Response::HTTP_OK);
    }

    public function createData(Request $request) {
        $validator = Validator::make($request->all(), [
            'nama' => ['required'],
            'asal' => ['required'],
            'waktu' => ['required'],
            'keterangan' => ['required'],
            'kontak' => ['required']
        ]);

        // $validator['uniqid'] = uniqid();

        if($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $bukutamu = BukuTamu::create([
                'nama' => $request->nama,
                'asal' => $request->asal,
                'waktu' => $request->waktu,
                'keterangan' => $request->keterangan,
                'kontak' => $request->kontak,
                'uniqid' => uniqid()

            ]);
            $response = [
                'status' => "OK",
                'result' => $bukutamu
            ];

            return response()->json($response, Response::HTTP_CREATED);
        } catch (QueryException $e) {
            return response()->json(['status' => "error", 'message' => "Failed " , $e->errorInfo]);
        }
    }

    public function updateData(Request $request, BukuTamu $bukutamu) {
        $validator = Validator::make($request->all(), [
            'nama' => ['required'],
            'asal' => ['required'],
            'waktu' => ['required'],
            'keterangan' => ['required'],
            'kontak' => ['required']
        ]);

        if($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $bukutamu->update($request->all());
            $response = [
                'status' => 'OK',
                'result' => $bukutamu
            ];
            return response()->json($response, Response::HTTP_OK);
        } catch (QueryException $e) {
            return response()->json(['status' => "error", 'message' => "Failed " , $e->errorInfo]);
        }
    }

    public function deleteData(BukuTamu $bukutamu) {
        $bukutamu->delete();
        return response()->json(['status' => "OK"], Response::HTTP_OK);
    }
}