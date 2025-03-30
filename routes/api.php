<?php

use App\Http\Controllers\Api\ApplicationController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\api\OperatorController;
use App\Http\Controllers\api\ParticipantController;
use App\Http\Controllers\Api\PostController;
use Illuminate\Support\Facades\Route;


Route::controller(AuthController::class)->group(function() {
    Route::post('/login', 'login');
    Route::post('/register', 'register');
    Route::post('/logout', 'logout');
});


Route::controller(PostController::class)->group(function(){
    Route::post('/post', 'addPost');
    Route::delete('/post/delete/{postId}', 'deletePost');
    Route::get('/posts/operator/{operatorId}', 'displayMyPosts');
    Route::get('/posts/all', 'displayAllPosts');
    Route::get('/posts/all/{operatorId}', 'displayApplicationsOnMyPosts');
    Route::get('/posts/total/{operatorId}', 'countMyPosts');
});


Route::controller(OperatorController::class)->group(function(){
    Route::post('/operator/info', 'addInfo');
});

Route::controller(ParticipantController::class)->group(function(){
    Route::post('/participant/info', 'addInfo');
});

Route::controller(ApplicationController::class)->group(function(){
    Route::post('/applications', 'addApplication');
    Route::delete('/applications/{applicationId}', 'deleteApplication');
    Route::get('/applications/posts/operator/{operatorId}', 'countAppOnMyPosts');
});