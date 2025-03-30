<?php

namespace App\Services;

use App\Interfaces\PostInterface;

class PostService{
    protected $postRepository;

    public function __construct(PostInterface $postRepository){
        $this->postRepository = $postRepository;
    }

    public function addPost(array $data){
        return $this->postRepository->addPost($data);
    }

    public function deletePost($postId){
        return $this->postRepository->deletePost($postId);
    }

    public function displayMyPosts($operatorId){
        return $this->postRepository->displayMyPosts($operatorId);
    }
    
    public function displayAllPosts(){
        return $this->postRepository->displayAllPosts();
    }

    public function displayApplicationsOnMyPosts($operatorId){
        return $this->postRepository->displayApplicationsOnMyPosts($operatorId);
    }

    public function countMyPosts($operatorId){
        return $this->postRepository->countMyPosts($operatorId);
    }
}