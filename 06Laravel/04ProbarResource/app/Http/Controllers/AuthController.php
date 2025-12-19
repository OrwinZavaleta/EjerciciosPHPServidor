<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);
        if (!Auth::attempt($credentials)) {
            return response()->json(["message" => "Unauthorized"], 401);
        }

        $token = $request->user()->createToken("auth_token")->plainTextToken;
        return response()->json(["access_token" => $token, "token_type" => "Bearer"]);
    }

    public function register(Request $request)
    {
        $credentials = $request->validate([
            "name" => "required|string",
            "email" => "required|email|unique:users,email",
            "password" => "required"
        ]);

        $user = User::create([
            "name" => $credentials["name"],
            "email" => $credentials["email"],
            "password" => bcrypt($credentials["password"])
        ]);

        $token = $user->createToken("auth_token")->plainTextToken;
        return response()->json(["access_token" => $token, "token_type" => "Bearer"]);
    }
    public function user(Request $request)
    {
        return response()->json($request->user());
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json(["message" => "Logged out"]);
    }
}
