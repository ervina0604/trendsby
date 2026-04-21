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

        $score = $post->like_count + ($post->comment_count * 2);

        DB::table('engagement')->insert([
            'id_post' => $post->id_post,
            'like_count' => $post->like_count,
            'comment_count' => $post->comment_count,
            'score' => $score,
        ]);

        preg_match_all('/#(\w+)/u', $request->caption, $matches);

        foreach ($matches[1] as $tag) {
            DB::table('hashtags')->insert([
                'hashtag_text' => $tag,
                'id_post' => $post->id_post,
            ]);
        }

        $cleanText = preg_replace('/#\w+/u', '', $request->caption);

        $words = preg_split('/\s+/', strtolower($cleanText));

        $words = array_filter($words, function ($word) {
            return !empty($word) && strlen($word) > 2;
        });

        $wordCounts = array_count_values($words);

        foreach ($wordCounts as $word => $count) {
            DB::table('keywords')->insert([
                'keyword_text' => $word,
                'frequency' => $count,
            ]);
        }

        return response()->json([
            'message' => 'Post berhasil ditambahkan',
            'data' => $post,
            'score' => $score,
            'hashtags' => $matches[1],
            'keywords' => $wordCounts,
        ], 201);
    }
}