<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $validated_data = $request->validated();

        try {
            $validated_data['password'] = bcrypt($validated_data['password']);
            User::create($validated_data);

            return response()->json([
                "message" => "User created successfully",
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                "message" => "An unexpected error occurred. Please try again later.",
                "error" => $e->getMessage()
            ], 500);
        }
    }
}
