<?php

namespace App\Auth;

interface AuthRepositoryInterface
{
    public function login(array $data);
    public function register(array $data);
    public function logout();
}
