<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PosteRequest;
use App\Services\PostService;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class PosteController extends Controller
{
    protected $postService;
    protected $user;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
        try {
            $this->user = JWTAuth::parseToken()->authenticate();
        } catch (JWTException $e) {
            return response()->json(['error' => 'Unauthenticated'], 401);
        }
    }

    public function addPost(PosteRequest $request)
    {
        try {
            $data = $request->validated();
            $data['user_id'] = $this->user->id;

            $post = $this->postService->addPost($data);

            return response()->json([
                "message" => "Post créé avec succès",
                "data" => $post
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                "message" => "Erreur lors de la création du post",
                "error" => $e->getMessage()
            ], 500);
        }
    }

    public function updatePost(PosteRequest $request, $id)
    {
        try {
            $data = $request->validated();
            $post = $this->postService->updatePost($id, $data, $this->user->id);

            return response()->json([
                "message" => "Post mis à jour avec succès",
                "data" => $post
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                "message" => "Post non trouvé"
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                "message" => "Erreur lors de la mise à jour",
                "error" => $e->getMessage()
            ], 500);
        }
    }

    public function deletePost($id)
    {
        try {
            $this->postService->deletePost($id, $this->user->id);

            return response()->json([
                "message" => "Post supprimé avec succès"
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                "message" => "Post non trouvé"
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                "message" => "Erreur lors de la suppression",
                "error" => $e->getMessage()
            ], 500);
        }
    }

    public function displayMyPosts()
    {
        try {
            $posts = $this->postService->displayMyPosts($this->user->id);

            return response()->json([
                "data" => $posts
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                "message" => "Erreur lors de la récupération des posts",
                "error" => $e->getMessage()
            ], 500);
        }
    }

    public function displayApplicationOnMyPosts()
    {
        try {
            $applications = $this->postService->displayApplicationOnMyPosts($this->user->id);

            return response()->json([
                "data" => $applications
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                "message" => "Erreur lors de la récupération des candidatures",
                "error" => $e->getMessage()
            ], 500);
        }
    }

    public function updateApplicationStatus(Request $request, $appId)
    {
        try {
            $validated = $request->validate([
                'status' => 'required|string|in:pending,accepted,rejected'
            ]);

            $application = $this->postService->updateApplicationStatus(
                $appId, 
                $validated['status'], 
                $this->user->id
            );

            return response()->json([
                "message" => "Statut mis à jour avec succès",
                "data" => $application
            ], 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                "message" => "Validation error",
                "errors" => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                "message" => "Erreur lors de la mise à jour du statut",
                "error" => $e->getMessage()
            ], 500);
        }
    }

    // Statistiques
    public function countMyPosts()
    {
        try {
            $count = $this->postService->countMyPosts($this->user->id);

            return response()->json([
                "count" => $count
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                "message" => "Erreur lors du comptage",
                "error" => $e->getMessage()
            ], 500);
        }
    }

    public function PostWithMaxApplication()
    {
        try {
            $post = $this->postService->PostWithMaxApplication($this->user->id);

            return response()->json([
                "data" => $post
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                "message" => "Erreur lors de la récupération",
                "error" => $e->getMessage()
            ], 500);
        }
    }

    public function PostWithMinApplication()
    {
        try {
            $post = $this->postService->PostWithMinApplication($this->user->id);

            return response()->json([
                "data" => $post
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                "message" => "Erreur lors de la récupération",
                "error" => $e->getMessage()
            ], 500);
        }
    }
}