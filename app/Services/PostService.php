<?php

namespace App\Services;

use App\Reposotories\Interfaces\PosteRepositoryInterface;
use App\Models\Poste;

class PostService
{
    protected $posteRepository;

    public function __construct(PosteRepositoryInterface $posteRepository)
    {
        $this->posteRepository = $posteRepository;
    }

    public function addPost(array $data){
        $this->posteRepository->addPost($data);
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
