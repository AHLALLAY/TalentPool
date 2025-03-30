<?php

namespace App\Services;

use App\Interfaces\AuthInterface;

class AuthService{

    protected $authRepository;

    public function __construct(AuthInterface $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function login($data){
        return $this->authRepository->login($data);
    }

    public function register($data){
        return $this->authRepository->register($data);
    }

    public function logout(){
        return $this->authRepository->logout();
    }
}