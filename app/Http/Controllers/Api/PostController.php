<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Services\PostService;
use Symfony\Component\CssSelector\Node\FunctionNode;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function addPost(PostRequest $postRequest){
        try{
            
            $validated_data = $postRequest->validated();
            // dd($validated_data);
            $this->postService->addPost($validated_data);
            return response()->json([
                "message" => "Post Added",
            ], 201);
        }catch(\Exception $e){
            return response()->json([
                "message" => "UnExpected Error",
                "error" => $e->getMessage()
            ], 500);
        }
    }

    public function deletePost($postId){
        try{
            $this->postService->deletePost($postId);
            return response()->json([
                "message" => "Post deleted"
            ], 200);

        }catch(\Exception $e){
            return response()->json([
                "message" => "UnExpected Error",
                "Error" => $e->getMessage()
            ], 500);
        }
    }

    public function displayMyPosts($operatorId){
        try{
            $posts = $this->postService->displayMyPosts($operatorId);
            return response()->json([
                "data" => $posts
            ], 200);

        }catch(\Exception $e){
            return response()->json([
                "message" => "Unexpected Error",
                "error" => $e->getMessage()
            ], 500);
        }
    }

    public function displayAllPosts(){
        try{
            $posts = $this->postService->displayAllPosts();
            return response()->json([
                "data" => $posts
            ], 200);

        }catch(\Exception $e){
            return response()->json([
                "message" => "Unexpected Error",
                "Error" => $e->getMessage()
            ], 500);
        }
    }

    public function displayApplicationsOnMyPosts($operatorId){
        try{
            $data = $this->postService->displayApplicationsOnMyPosts($operatorId);
            return response()->json([
                "data" => $data
            ],200);

        }catch(\Exception $e){
            return response()->json([
                "message" => "UnExpected error",
                "error" => $e->getMessage()
            ], 500);
        }
    }

    public function countMyPosts($operatorId){
        try{
            
            $posts = $this->postService->countMyPosts($operatorId);

            return response()->json([
                "number" => $posts." Posts"
            ], 200);
        }catch(\Exception $e){
            return response()->json([
                "message" => "UnExpected Error",
                "Error" => $e->getMessage()
            ], 500);
        }
    }
    
}
