<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PosteController;
use Illuminate\Support\Facades\Route;


Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::post('/oparetor/posts', [PosteController::class, 'addPost']);

Route::post('/operator/posts/{id}',[PosteController::class, 'updatePost']);