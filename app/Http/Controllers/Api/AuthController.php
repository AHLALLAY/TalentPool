<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Interfaces\AuthRepositoryInterface;

class AuthController extends Controller
{
    protected $authRepository;

    public function __construct(AuthRepositoryInterface $authRepository){
        $this->authRepository = $authRepository;
    }

    public function register(RegisterRequest $request){
        $user = $this->authRepository->register($request->only('name', 'email', 'password', 'roles'));
        // $user = $this->authRepository->register($request->all());
        
        return response()->json([
            "message" => "User registered successfully"
        ], 201);
    }

    public function login(LoginRequest $request){   
        $token = $this->authRepository->login($request->only('email', 'password'));

        if(!$token){
            return response()->json([
                "message" => "Unauthorazed"
            ], 401);
        }

        return response()->json([
            "token" => $token,
            "token_type" => "bearer"
        ], 200);
    }
}
