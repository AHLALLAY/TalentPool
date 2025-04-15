<?php
namespace App\Repositories;

use App\Models\User;
use App\Interfaces\AuthInterface;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Exception;

class AuthRepository implements AuthInterface
{
    public function login($data)
    {
        try {
            if (!$token = JWTAuth::attempt($data)) {
                return null;
            }
            
            $user = Auth::user();
            
            if (!$user) {
                throw new Exception('Utilisateur non trouvé après authentification');
            }

            return [
                'token' => $token,
                'user' =>  $user,
            ];
            
        } catch (Exception $e) {
            return response()->json([
                "message" => "Unexpected Error",
                "error" => $e->getMessage()
            ], 500);
        }
    }

    public function register($data)
    {
        try {
            $data['password'] = Hash::make($data['password']);
            
            return User::create($data);
            
        } catch (Exception $e) {
            return response()->json([
                "message" => "Unexpected Error",
                "error" => $e->getMessage()
            ], 500);
        }
    }

    public function logout(): bool
    {
        try {
            if (!Auth::check()) {
                return true;
            }
            
            $token = JWTAuth::getToken();
            if (!$token) {
                $token = request()->bearerToken();
            }
    
            if ($token) {
                JWTAuth::setToken($token)->invalidate();
            }
    
            Auth::logout();
            return true;
    
        } catch (Exception $e) {
            throw new Exception('Logout failed: ' . $e->getMessage());
        }
    }
}