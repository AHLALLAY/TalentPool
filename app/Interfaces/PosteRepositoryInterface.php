<?php

namespace App\Interfaces;

interface PosteRepositoryInterface
{
    public function addPost(array $data);
    public function updatePost(int $postId, array $data);
    public function deletePost(int $postId);
    public function displayMyPosts(int $userId);
    public function displayApplicationOnMyPosts(int $userId);
    public function updateApplicationStatus(int $appId, string $status);
    public function addInfo(array $data);
    // statistics
    public function countMyPosts(int $userId);
    public function PostWithMaxApplication(int $userId);
    public function PostWithMinApplication(int $userId);
}