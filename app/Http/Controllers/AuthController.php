<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = Arr::only($request->all(), ['email', 'password']);
        if (!Auth::attempt($credentials))
        {            
            throw abort(422, 'The provided credentials do not match our records.');
        }

        $user = Auth::user();
        $this->deleteAllToken($user);

        $token = $this->createToken($user);

        return response()->json([
            'data' => [
                'token' => $token
            ]
        ]);
    }

    public function user()
    {
        $user = Auth::user();
        return response()->json([
            'data' => $user
        ]);
    }

    public function logout()
    {
        $this->deleteAllToken(Auth::user());

        return response()->json(['message' => 'user berhasil logout']);
    }

    public function createToken(User $user) : string
    {
        $token = $user->createToken('auth_token')->plainTextToken;
        return $token;
    }

    public function deleteAllToken(User $user) : void
    {
        $user->tokens()->delete();
    }
}
