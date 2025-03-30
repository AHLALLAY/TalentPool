<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\OperatorRequest;
use App\Http\Requests\ParticipantRequest;
use App\Services\InfoService;

class ParticipantController extends Controller
{
    protected $infoService;

    public function __construct(InfoService $infoService)
    {
        $this->infoService = $infoService;
    }

    public function addInfo(ParticipantRequest $participantRequest){
        try{
            $validated_data = $participantRequest->validated();
            $this->infoService->addInfo($validated_data, 'participant');
            return response()->json([
                "message" => "Information added"
            ], 201);
        }catch(\Exception $e){
            return response()->json([
                "message" => "UnExpected Error",
                "error" => $e->getMessage()
            ], 500);
        }
    }
}
