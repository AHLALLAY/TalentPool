<?php

namespace App\Http\Controllers\Api;

use App\Models\Operator;
use App\Http\Controllers\Controller;
use App\Http\Requests\OperatorRequest;
use Illuminate\Http\Request;

class OperatorController extends Controller
{
    public function addOperatorInfo(OperatorRequest $request){
        try{
            $validated_data = $request->validated();
            Operator::create($validated_data);
    
            return response()->json([
                "message" => "your info is added"
            ], 201);
        }catch(\Exception $e){
            return response()->json([
                "message" => "Unexcpected error",
                "error" => $e->getMessage()
            ], 500);
        }
    }

}