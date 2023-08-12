<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'username' => 'required',
            'password' => 'required'
        ]);

        if($validator->fails()) {
            return response()->json($validator->errors());
        }

        try {
            $user = User::create([
                'name' => $request->name,
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'role' => 'user'
            ]);
    
            $token = $user->createToken('auth_token', ['user'])->plainTextToken;
    
            $response = [
                'status' => "OK",
                'token' => $token,
                'result' => $user
            ];
    
            return response()->json($response, Response::HTTP_CREATED);
        } catch (QueryException $e) {
            return response()->json(['status' => "error", 'message' => "Failed " , $e->errorInfo]);
        }

    }

    public function login(Request $request) {
        if (!Auth::attempt($request->only('username', 'password'))) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $user = User::where('username', $request->username)->firstOrFail();
        
        if($user->role == 'admin') {
            $token = $user->createToken('auth_token', ['admin'])->plainTextToken;
        } else {
            $token = $user->createToken('auth_token', ['user'])->plainTextToken;
        }
        
        $response = [
            'status' => "OK",
            'token' => $token,
            'result' => $user
        ];

        return response()->json($response, Response::HTTP_OK);
    }  

    public function logout()
    {
        auth()->user()->tokens()->delete();

        return response()->json(['status' => "OK"]);
    }

}
