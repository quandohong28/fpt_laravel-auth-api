<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function register(StoreUserRequest $request)
    {
        
        $isValidate = $request->validated(); 

        if ($isValidate) {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            return response()->json(['message' => 'Đăng ký tài khoản thành công!', 'user' => $user], 201);
        }
        return response()->json(['message' => 'Đăng ký tài khoản thất bại!'], 422);

    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (!Auth::guard('api')->attempt($request->only('email', 'password'))) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $user = Auth::guard('api')->user();
        $token = $request->user()->createToken('auth_token')->plainTextToken;
        return response()->json(['token' => $token, 'user' => $user]);
    }

    public function logout(Request $request)
    {
        // $request->user()->tokens()->delete();

        // return response()->json(['message' => 'Logged out successfully']);

        return response()->json(['message' => 'Logged out successfully']);
    }
}
