<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Repositories\AuthRepositoryInterface;

class AuthController extends Controller
{
    protected $authRepository;

    public function __construct(AuthRepositoryInterface $authRepository){
        $this->authRepository = $authRepository;
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
