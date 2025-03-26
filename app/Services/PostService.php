<?php

namespace App\Services;

use App\Interfaces\PosteRepositoryInterface;

class PostService
{
    protected $posteRepository;

    public function __construct(PosteRepositoryInterface $posteRepository)
    {
        $this->posteRepository = $posteRepository;
    }

    public function addPost(array $data)
    {
        return $this->posteRepository->addPost($data);
    }

    public function updatePost($postId, array $data)
    {
        return $this->posteRepository->updatePost($postId, $data);
    }

    public function deletePost($postId)
    {
        return $this->posteRepository->deletePost($postId);
    }

    public function displayMyPosts($userId)
    {
        return $this->posteRepository->displayMyPosts($userId);
    }

    public function displayApplicationOnMyPosts($userId)
    {
        return $this->posteRepository->displayApplicationOnMyPosts($userId);
    }

    public function updateApplicationStatus($appId, $status)
    {
        return $this->posteRepository->updateApplicationStatus($appId, $status);
    }

    public function addInfo($data)
    {
        return $this->posteRepository->addInfo($data);
    }

    // Statistics
    public function countMyPosts($userId)
    {
        return $this->posteRepository->countMyPosts($userId);
    }

    public function PostWithMaxApplication($userId)
    {
        return $this->posteRepository->PostWithMaxApplication($userId);
    }

    public function PostWithMinApplication($userId)
    {
        return $this->posteRepository->PostWithMinApplication($userId);
    }
}