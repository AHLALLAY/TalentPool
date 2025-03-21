<?php

namespace App\Http\Controllers\Api;
use App\Models\Participant;
use App\Http\Controllers\Controller;
use App\Http\Requests\ParticipantRequest;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    public function addParticipantInfo(ParticipantRequest $request){
        try{
            $validated_data = $request->validated();
            Participant::create($validated_data);
    
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
