<?php
namespace App\Repositories;

use App\Models\User;
use App\Interfaces\AuthInterface;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthRepository implements AuthInterface{
    public function login($data)
    {
        if(!$token = JWTAuth::attempt($data)){
            return null;
        }
        return $token;
    }

    public function register($data)
    {
        try{
            return User::create($data);
        }catch(\Exception $e){
            return response()->json([
                "message" => "UnExpected Error",
                "error" =>$e->getMessage()
            ], 500);
        }
    }

    public function logout()
    {
        JWTAuth::invalidate(JWTAuth::getToken());
        Auth::logout();
        return true;
    }
}