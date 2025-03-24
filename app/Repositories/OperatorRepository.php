<?php

namespace App\Repositories;

use App\Interfaces\OperatorRepositoryInterface;
use App\Models\Poste;

class OperatorRepository implements OperatorRepositoryInterface
{
    public function addPost($data){
        if(!is_array($data)){
            return response()->json([
                "message" => "Entries must be array"
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
