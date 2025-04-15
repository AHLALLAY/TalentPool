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
            $data = $this->authService->login($validated_data);
            return response()->json([
                "message" => "Welcome Back",
                "data" => $data
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

    public function logout()
    {
        try {
            $logoutResult = $this->authService->logout();
            
            if (!$logoutResult) {
                return response()->json([
                    "message" => "No authenticated user"
                ], 200);
            }
    
            return response()->json([
                "message" => "Good bye",
                "success" => true
            ], 200);
    
        } catch (\Exception $e) {
            return response()->json([
                "message" => "Logout failed",
                "error" => $e->getMessage(),
                "success" => false
            ], 500);
        }
    }
}