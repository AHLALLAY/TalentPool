<?php

namespace App\Interfaces;

interface OperatorRepositoryInterface
{
    public function addPost($data);
    public function updatePost($id);
    public function deletePost($id);
    public function displayMyPosts();
    public function displayApplicationOnMyPosts();
    public function updateApplicationStatus($id);
    public function addInfo($data);
    // statistics
    public function countMyPosts();
    public function PostWithMaxApplication();
    public function PostWithMinApplication();
    
}
