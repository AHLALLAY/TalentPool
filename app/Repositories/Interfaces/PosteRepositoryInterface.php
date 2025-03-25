<?php

namespace App\Reposotories\Interfaces;

interface PosteRepositoryInterface
{
    public function addPost($data);
    public function updatePost($postId);
    public function deletePost($postId);
    public function displayMyPosts($userId);
    public function displayApplicationOnMyPosts();
    public function updateApplicationStatus($appId);
    public function addInfo($data);
    // statistics
    public function countMyPosts();
    public function PostWithMaxApplication();
    public function PostWithMinApplication();
    
}
