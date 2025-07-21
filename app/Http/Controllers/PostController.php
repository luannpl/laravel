<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

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
        $title = $request->title;
        $body = $request->body;

        $post = Post::create([
            "title" => $title,
            "body" => $body
        ]);
        return $post;
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
