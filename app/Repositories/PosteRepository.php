<?php

namespace App\Repositories;

use App\Repositories\Interfaces\PosteRepositoryInterface;
use App\Models\Poste;

class PosteRepository implements PosteRepositoryInterface
{
    public function addPost($data){
        if(!is_array($data)){
            return response()->json([
                "message" => "Entries must be table of 'key : value'"
            ], 400);
        }
        $post = Poste::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'expired_date' => $data['expired_date'],
            'user_id' => $data['user_id']
        ]);
        return $post;
    }
    public function updatePost($posteId){

    }
    public function deletePost($posteId){

    }
    public function displayMyPosts($userId){
        
    }
    public function displayApplicationOnMyPosts(){

    }
    public function updateApplicationStatus($appId){

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
