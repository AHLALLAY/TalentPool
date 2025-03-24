<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PosteRequest;
use App\Repositories\PosteRepository;
use Illuminate\Http\Request;

class PosteController extends Controller
{
    protected $posteRepository;

    public function __construct(PosteRepository $posteRepository)
    {
        $this->posteRepository = $posteRepository;
    }

    public function addPost(PosteRequest $request){
        try{
            $post = $this->posteRepository->addPost($request->validated());

            return response()->json([
                "message" => "post added"
            ], 201);
        }catch(\Exception $e){
            return response()->json([
                "message" => "Unexpected Error",
                "Error" => $e->getMessage()
            ], 500);
        }

    }
    public function updatePost($id){

    }
    public function deletePost($id){

    }
    public function displayMyPosts(){

    }
    public function displayApplicationOnMyPosts(){

    }
    public function updateApplicationStatus($id){

    }
    public function addInfo($data){

    }
    // statistics
    public function countMyPosts(){

    }
    public function PostWithMaxApplication(){

    }
    public function PostWithMinApplication(){

    }
}
