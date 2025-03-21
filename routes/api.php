<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\OperatorController;
use App\Http\Controllers\Api\ParticipantController;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::post('/operator/info', [OperatorController::class, 'addOperatorInfo'])->name('OperatorInfo');

Route::post('/participant/info', [ParticipantController::class, 'addParticipantInfo'])->name('ParticipantInfo');
Route::post('/participant/application', [ParticipantController::class, 'addApplication'])->name('Application');