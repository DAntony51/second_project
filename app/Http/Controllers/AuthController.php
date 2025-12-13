<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller

{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if ($token = auth()->attempt($credentials)) {
            return response()->json([
                'access_token' => $token,
                'token_type' => 'bearer',
                'expires_in' => auth()->factory()->getTTL() * 60,
                'user' => auth()->user()
            ]);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }
//    public function login(Request $request)
//    {
//        $credentials = $request->only('email', 'password');
//
//        // Проверим аутентификацию
//        if ($token = auth()->attempt($credentials)) {
//            return response()->json([
//                'access_token' => $token,
//                'token_type' => 'bearer',
//                'expires_in' => auth()->factory()->getTTL() * 60,
//                'user' => auth()->user()
//            ]);
//        }
//
//        // Если аутентификация не удалась, проверим почему
//        $user = \App\Models\User::where('email', $request->email)->first();
//        if (!$user) {
//            return response()->json(['error' => 'User not found'], 401);
//        }
//
//        // Проверим пароль вручную
//        if (!\Hash::check($request->password, $user->password)) {
//            return response()->json(['error' => 'Invalid password'], 401);
//        }
//
//        return response()->json(['error' => 'Authentication failed'], 401);
//    }




//    public function login(Request $request)
//    {
//        $credentials = $request->only('email', 'password');
//
//        if ($token = Auth::attempt($credentials)) {
//            return $this->respondWithToken($token);
//        }
//
//        return response()->json(['error' => 'Unauthorized'], 401);
//    }

    public function register(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $token = Auth::login($user);
        return $this->respondWithToken($token);
    }

    public function logout()
    {
        Auth::logout();
        return response()->json(['message' => 'Successfully logged out']);
    }

    public function refresh()
    {
        return $this->respondWithToken(Auth::refresh());
    }

    public function me()
    {
        return response()->json(Auth::user());
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::factory()->getTTL() * 60
        ]);
    }

}
