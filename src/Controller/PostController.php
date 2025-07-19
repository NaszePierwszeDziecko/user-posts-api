<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/posts', name: 'post_')]
class PostController extends AbstractController
{
    // TODO: Implement CRUD operations for posts
    // - GET /posts - List all posts (with pagination)
    // - GET /posts/{id} - Get specific post
    // - POST /posts - Create new post
    // - PUT /posts/{id} - Update post
    // - DELETE /posts/{id} - Delete post
    
    #[Route('', name: 'index', methods: ['GET'])]
    public function index(): JsonResponse
    {
        // TODO: Implement listing posts
        return $this->json(['message' => 'List posts - to be implemented']);
    }

    #[Route('/{id}', name: 'show', methods: ['GET'])]
    public function show(int $id): JsonResponse
    {
        // TODO: Implement getting specific post
        return $this->json(['message' => 'Show post - to be implemented', 'id' => $id]);
    }

    #[Route('', name: 'create', methods: ['POST'])]
    public function create(Request $request): JsonResponse
    {
        // TODO: Implement creating new post
        return $this->json(['message' => 'Create post - to be implemented']);
    }

    #[Route('/{id}', name: 'update', methods: ['PUT'])]
    public function update(Request $request, int $id): JsonResponse
    {
        // TODO: Implement updating post
        return $this->json(['message' => 'Update post - to be implemented', 'id' => $id]);
    }

    #[Route('/{id}', name: 'delete', methods: ['DELETE'])]
    public function delete(int $id): JsonResponse
    {
        // TODO: Implement deleting post
        return $this->json(['message' => 'Delete post - to be implemented', 'id' => $id]);
    }
} 