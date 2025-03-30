<?php

namespace App\Repositories;

use App\Interfaces\PostInterface;
use App\Models\Operator;
use App\Models\Post;
use Symfony\Component\CssSelector\Node\FunctionNode;

class PostRepository implements PostInterface{
    public function addPost(array $data){
        return Post::create($data);
    }
    
    public function deletePost(int $postId)
    {   
        $post = Post::findOrFail($postId);
        
        return $post->delete();
    }

    public function displayMyPosts(int $operatorId)
    {
        return Post::where('operator_id', $operatorId)->get();

    }

    public function displayAllPosts()
    {
        return Post::all();
    }

    public function displayApplicationsOnMyPosts(int $operatorId)
    {
        return Post::where('operator_id', $operatorId)
                        ->with('applications')
                        ->get();
    }

    // statistics
    public function countMyPosts($operatorId)
    {
     return Post::where('operator_id', $operatorId)->count();   
    }
}