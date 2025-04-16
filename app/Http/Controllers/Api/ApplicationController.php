<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApplicationRequest;
use App\Services\ApplicationService;

class ApplicationController extends Controller
{
    protected $applicationService;

    public function __construct(ApplicationService $applicationService)
    {
        $this->applicationService = $applicationService;   
    }

    public function addApplication(ApplicationRequest $applicationRequest){
        try{
            $validated_data = $applicationRequest->validated();
            $this->applicationService->addApplication($validated_data);

            return response()->json([
                "message" => "Application added"
            ], 201);
        }catch(\Exception $e){
            return response()->json([
                "message" => "UnExpected Error",
                "Error" => $e->getMessage()
            ], 500);
        }
    }

    public function deleteApplication($applicationId){
        try{
            $this->applicationService->deleteApplication($applicationId);
            return response()->json([
                "message" => "application deleted",
            ], 200);
        }catch(\Exception $e){
            return response()->json([
                "message" => "Unexpected Error",
                "error" => $e->getMessage()
            ], 500);
        }
    }


    public function displayMyApplications($participantId){
        try{
            $data = $this->applicationService->displayMyApplications($participantId);
            return response()->json([
                "data" => $data,
            ], 200);
        }catch(\Exception $e){
            return response()->json([
                "message" => "Unexpected Error",
                "error" => $e->getMessage()
            ],500);
        }
    }
    
    // statistics
    public function countAppOnMyPosts($operatorId){
        try{
            $data = $this->applicationService->countAppOnMyPosts($operatorId);
            return response()->json([
                "data" => $data." participant are applied"
            ], 200);
        }catch(\Exception $e){
            return response()->json([
                "message" => "UnExpected Error",
                "error" => $e->getMessage()
            ], 500);
        }
    }
}
