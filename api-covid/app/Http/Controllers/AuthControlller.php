<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthControlller extends Controller
{
    // method patients daftar
    public function register(Request $request) {
        $input = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];

        $user = User::create($input);

        $response = [
            'message' => 'Register is successfully'
        ];

        return response()->json($response, 200);
    }

    // method patients masuk
    public function login(Request $request) {
        $input = [
            'email' => $request->email,
            'password' => $request->password
        ];

        $user = User::where('email', $input['email'])->first();
        $message = '';
        $token = '';
        $statusCode = 0;

        if ($input['email'] == $user->email && Hash::check($input['password'], $user->password)) {
            $token = $user->createToken('oauth_token');
            $message = 'Login is successfully';
            $token = $token->plainTextToken;
            $statusCode = 200;
        } else {
            $message = 'Login is invalid';
            $statusCode = 404;
            $token = '-';
        }

        // membuat response
        $response = [
            'message' => $message,
            'status code' => $statusCode,
            'token'  => $token
        ];

        return response()->json($response, $statusCode);
    }
}
