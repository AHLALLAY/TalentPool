<?php

namespace App\Repositories;

use App\Interfaces\PosteRepositoryInterface;
use App\Models\Poste;
use App\Models\Application;

class PosteRepository implements PosteRepositoryInterface
{
    public function addPost($data)
    {
        return Poste::create($data);
    }

    public function updatePost($postId, $data)
    {
        $post = Poste::findOrFail($postId);
        $post->update($data);
        return $post;
    }

    public function deletePost($postId)
    {
        $post = Poste::findOrFail($postId);
        $post->delete();
        return true;
    }

    public function displayMyPosts($userId)
    {
        return Poste::where('user_id', $userId)
                   ->withCount('applications')
                   ->latest()
                   ->get();
    }

    public function displayApplicationOnMyPosts($userId)
    {
        return Poste::where('user_id', $userId)
                   ->with(['applications', 'applications.user'])
                   ->get();
    }

    public function updateApplicationStatus($appId, $status)
    {
        $application = Application::findOrFail($appId);
        $application->update(['status' => $status]);
        return $application;
    }

    public function addInfo($data)
    {
        // Implémentation pour ajouter des informations supplémentaires
        return true;
    }

    // Statistics
    public function countMyPosts($userId)
    {
        return Poste::where('user_id', $userId)->count();
    }

    public function PostWithMaxApplication($userId)
    {
        return Poste::where('user_id', $userId)
                   ->withCount('applications')
                   ->orderBy('applications_count', 'desc')
                   ->first();
    }

    public function PostWithMinApplication($userId)
    {
        return Poste::where('user_id', $userId)
                   ->withCount('applications')
                   ->orderBy('applications_count', 'asc')
                   ->first();
    }
}