<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'id_user' => 'nullable|exists:users,id',
            'caption' => 'required|string',
            'tanggal_post' => 'required|date',
            'like_count' => 'nullable|integer',
            'comment_count' => 'nullable|integer',
        ]);

        $post = Post::create([
            'id_user' => $request->id_user,
            'caption' => $request->caption,
            'tanggal_post' => $request->tanggal_post,
            'like_count' => $request->like_count ?? 0,
            'comment_count' => $request->comment_count ?? 0,
        ]);
        
        preg_match_all('/#(\w+)/u', $request->caption, $matches);
        
        foreach ($matches[1] as $tag) {
            DB::table('hashtags')->insert([
                'hashtag_text' => $tag,
                'id_post' => $post->id_post,
            ]);
        }

        return response()->json([
            'message' => 'Post berhasil ditambahkan',
            'data' => $post,
            'hashtags' => $matches[1],
        ], 201);
    }
}