<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\AuthService;

class AuthController extends Controller
{
    protected $authService;
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login(LoginRequest $loginRequest){
        try{
            $validated_data = $loginRequest->validated();
            $token = $this->authService->login($validated_data);
            return response()->json([
                "message" => "Welcome Back",
                "token" => $token
            ], 200);
        }catch(\Exception $e){
            return response()->json([
                "message" => "UnExpected Error While Logging",
                "error" => $e->getMessage()
            ], 500);
        }
    }

    public function register(RegisterRequest $registerRequest){
        try{
            $validated_data = $registerRequest->validated();
            $this->authService->register($validated_data);

            return response()->json([
                "message" => "User added"
            ] ,201);
        }catch(\Exception $e){
            return response()->json([
                "message" => "UnExpected Error",
                "error" => $e->getMessage()
            ], 500);
        }
    }

    public function logout(){
        try{
            $this->authService->logout();
            return response()->json([
                "message" => "Good bye"
            ], 200);
        }catch(\Exception $e){
            return response()->json([
                "message" => "UnExpected Error While Exit",
                "error" => $e->getMessage()
            ], 500);
        }
    }
}
