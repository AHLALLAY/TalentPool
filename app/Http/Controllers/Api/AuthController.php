<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(RegisterRequest $request){
        // dd($request);
        $validated_data = $request->validated();

        $idExisteUser = User::where('email', $validated_data['email'])->first();
        if($idExisteUser){
            return response()->json([
                "message" => "this user alreay has an account",
            ], 200);
        }else{
            $user = User::create($validated_data);
            $token = $user->createToken('auth_token')->plainTextToken;
            if($user){
                return response()->json([
                    "message" => "user created",
                    "token" => $token
                ], 201);
            }else{
                return response()->json([
                    "massage" => "Unexpected error",
                ], 500);
            }
        }
        
        return response()->json([
            "message" => "this user already existe",
        ], 200);

    }
}
