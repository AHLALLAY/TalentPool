<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\AuthService;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function register(RegisterRequest $request)
    {
        $user = $this->authService->register($request->validated());

        return response()->json([
            "message" => "User registered successfully",
            "user" => $user
        ], 201);
    }

    public function login(LoginRequest $request)
    {
        $token = $this->authService->login($request->validated());
        
        if (!$token) {
            return response()->json([
                "message" => "Unauthorized"
            ], 401);
        }

        return response()->json([
            "token" => $token,
            "token_type" => "bearer"
        ], 200);
    }

    public function logout()
    {
        try {
            $this->authService->logout();
            return response()->json(['message' => 'Successfully logged out'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}