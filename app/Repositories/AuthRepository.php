<?php

namespace App\Repositories;

use App\Repositories\AuthRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthRepository implements AuthRepositoryInterface
{
    public function register(array $data)
    {
        // Créer un nouvel utilisateur
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        return $user;
    }

    public function login(array $data)
    {
        // Vérifier les informations d'identification
        if (!$token = JWTAuth::attempt($data)) {
            return null; // Retourner null si les informations sont invalides
        }

        return $token; // Retourner le token JWT
    }

    public function logout()
    {
        // Invalider le token JWT
        JWTAuth::invalidate(JWTAuth::getToken());

        // Déconnecter l'utilisateur
        Auth::logout();

        return true;
    }
}