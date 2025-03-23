<?php

namespace App;

interface OperatorInterface
{
    public function addPost();
    public function updatePost($id);
    public function deletePost($id);
    public function displayMyPosts();
    public function displayApplicationOnMyPosts();
    public function updateApplicationStatus($id);
    // statistics
    public function countMyPosts();
    public function PostWithMaxApplication();
    public function PostWithMinApplication();
    
}
