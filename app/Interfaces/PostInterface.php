<?php

namespace App\Interfaces;

interface PostInterface{
    public function addPost(array $data); // pour le recruteur
    public function deletePost(int $postId); // pour le recruteur
    public function displayMyPosts(int $operatorId); // pour le recruteur
    public function displayAllPosts(); // pour le condidat
    public function displayApplicationsOnMyPosts(int $operatorId); // pour le recruteur
    
    // statistics
    public function countMyPosts(int $operatorId); // pour le recruteur
}