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
        $this->authService->register($request->validated());

        return response()->json([
            "message" => "[^_^] User registered successfully",
        ], 201);
    }

    public function login(LoginRequest $request)
    {
        $token = $this->authService->login($request->validated());
        
        if (!$token) {
            return response()->json([
                "message" => "[X] Unauthorized"
            ], 401);
        }

        return response()->json([
            "message" => "{^_^} Welcome Back",
            "token" => $token
        ], 200);
    }

    public function logout()
    {
        try {
            $this->authService->logout();
            return response()->json(['message' => '(!_!) Goodbye'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}