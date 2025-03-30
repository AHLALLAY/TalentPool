<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\OperatorRequest;
use App\Services\InfoService;

class OperatorController extends Controller
{
    protected $infoService;

    public function __construct(InfoService $infoService)
    {
        $this->infoService = $infoService;
    }

    public function addInfo(OperatorRequest $operatorRequest){
        try{
            $validated_data = $operatorRequest->validated();
            $this->infoService->addInfo($validated_data, 'operator');
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
