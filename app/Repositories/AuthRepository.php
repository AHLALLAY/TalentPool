<?php

namespace App\Repositories;

use App\Interfaces\AuthRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthRepository implements AuthRepositoryInterface
{
    public function register($data)
    {
        if (!is_array($data)) {
            return response()->json([
                "message" => "Entries must be an array"
            ], 400); // Bad Request
        }

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'roles' => $data['roles']
        ]);

        return $user;
    }

    public function login($data)
    {
        if (!is_array($data)) {
            return response()->json([
                "message" => "Entries must be an array"
            ], 400); // "Bad Request"
        }

        if (!$token = JWTAuth::attempt($data)) {
            return null;
        }

        return $token;
    }

    public function logout()
    {
        JWTAuth::invalidate(JWTAuth::getToken());
        Auth::logout();

        return true;
    }
}