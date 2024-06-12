<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $email = $request->email;
        $password = $request->password;

        // if (auth()->attempt($request->only('email', 'password'))) {
        //     return response()->json([
        //         'status' => 'success',
        //         'message' => 'Login Berhasil',
        //         'data' => auth()->user()
        //     ], 200);
        // }
        $role = 'user';
        if ($email == 'admin@hanif.com' && $password == 'admin') {
            $role = 'admin';
        }
        if ($role == 'admin') {
            return response()->json([
                'status' => 'success',
                'message' => 'Login Berhasil',
                'data' => [
                    'name' => 'Hanif Syauqi',
                    'role' => 'admin'
                ]
            ], 200);
        }
        else {
            return response()->json([
                'status' => 'success',
                'message' => 'Login Berhasil',
                'data' => [
                    'name' => 'Hanif Syauqi',
                    'role' => 'user'
                ]
            ], 200);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Login Gagal'
        ], 401);
    }
}
