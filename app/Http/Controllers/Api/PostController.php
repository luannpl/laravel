<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Validation\ValidationException;

class PostController extends Controller
{
    public function index()
    {
        return Post::all();
    }

    public function show(Post $post)
    {
        return Post::find($post);
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'body' => 'required|string',
                'user_id' => 'required|exists:users,id',
            ]);

            $post = Post::create($validated);

            return response()->json($post, 201);
        } catch (ValidationException $e) {
            return response()->json([
                'errors' => $e->errors(),
            ], 422);
        }
    }

    public function update(Post $post, Request $request)
    {
        $post->update([
            'title' => $request->title,
            'body' => $request->body
        ]);

        return response()->json(["message" => "Post atualizado", "post" => $post], 200);
    }

    public function destroy(Post $post)
    {
        if ($post->delete()) {
            return response()->json(['message' => 'Post deletado com sucesso'], 200);
        }

        return response()->json(['message' => 'Erro ao deletar o post'], 500);
    }
}
