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

        // Hitung dan simpan engagement
        $score = $post->like_count + ($post->comment_count * 2);

        DB::table('engagement')->insert([
            'id_post' => $post->id_post,
            'like_count' => $post->like_count,
            'comment_count' => $post->comment_count,
            'score' => $score,
        ]);

        // Ambil hashtag dari caption
        preg_match_all('/#(\w+)/u', $request->caption, $matches);

        foreach ($matches[1] as $tag) {
            DB::table('hashtags')->insert([
                'hashtag_text' => $tag,
                'id_post' => $post->id_post,
            ]);
        }

        // Hapus hashtag dari caption
        $cleanText = preg_replace('/#\w+/u', '', $request->caption);

        // Pecah caption menjadi kata
        $words = preg_split('/\s+/', strtolower($cleanText));

        // Hapus kata kosong dan kata terlalu pendek
        $words = array_filter($words, function ($word) {
            return !empty($word) && strlen($word) > 2;
        });

        // Hitung frekuensi keyword
        $wordCounts = array_count_values($words);

        // Simpan keyword
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

    public function trend()
    {
        $topHashtags = DB::table('hashtags')
            ->select('hashtag_text', DB::raw('COUNT(*) as total'))
            ->groupBy('hashtag_text')
            ->orderByDesc('total')
            ->limit(5)
            ->get();

        $topKeywords = DB::table('keywords')
            ->select('keyword_text', DB::raw('SUM(frequency) as total'))
            ->groupBy('keyword_text')
            ->orderByDesc('total')
            ->limit(8)
            ->get();

        DB::table('trend_analysis')->insert([
            'period' => 'mingguan',
            'hashtag_result' => json_encode($topHashtags),
            'keyword_result' => json_encode($topKeywords),
        ]);

        return response()->json([
            'message' => 'Trend analysis berhasil',
            'top_hashtags' => $topHashtags,
            'top_keywords' => $topKeywords,
        ]);
    }

    public function showDashboard()
    {
        $totalPostingan = DB::table('posts')->count();
        $totalHashtag = DB::table('hashtags')->count();
        $totalKeyword = DB::table('keywords')->count();

        $highestEngagement = DB::table('engagement')->max('score') ?? 0;

        $topHashtags = DB::table('hashtags')
            ->select('hashtag_text as label', DB::raw('COUNT(*) as value'))
            ->groupBy('hashtag_text')
            ->orderByDesc('value')
            ->limit(5)
            ->get();

        $maxHashtagValue = $topHashtags->max('value') ?: 1;

        $topHashtags = $topHashtags->map(function ($item) use ($maxHashtagValue) {
            $item->width = round(($item->value / $maxHashtagValue) * 100) . '%';
            return $item;
        });

        $topKeywords = DB::table('keywords')
            ->select('keyword_text as label', DB::raw('SUM(frequency) as value'))
            ->groupBy('keyword_text')
            ->orderByDesc('value')
            ->limit(8)
            ->get();

        $weeklyPosts = DB::table('posts')
            ->selectRaw('DAYNAME(tanggal_post) as day_name, COUNT(*) as total')
            ->groupBy('day_name')
            ->pluck('total', 'day_name');

        $dayMap = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        $dayLabels = ['MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT', 'SUN'];

        $weeklyChart = [];
        $maxWeekly = 1;

        foreach ($dayMap as $index => $day) {
            $value = $weeklyPosts[$day] ?? 0;
            $weeklyChart[] = [
                'label' => $dayLabels[$index],
                'value' => $value,
            ];
            if ($value > $maxWeekly) {
                $maxWeekly = $value;
            }
        }

        foreach ($weeklyChart as &$item) {
            $item['height'] = $item['value'] > 0
                ? max(12, round(($item['value'] / $maxWeekly) * 100))
                : 8;
        }

        $summaryCards = [
            [
                'title' => 'TOTAL POSTINGAN',
                'value' => $totalPostingan,
                'note'  => 'Data',
                'note_color' => 'text-[#2E7D32]',
                'top_line' => 'bg-[#0B5B94]',
                'icon' => 'postingan.png',
                'icon_opacity' => 'opacity-10'
            ],
            [
                'title' => 'TOTAL HASHTAG',
                'value' => $totalHashtag,
                'note'  => 'Data',
                'note_color' => 'text-[#2E7D32]',
                'top_line' => 'bg-[#7EDC8A]',
                'icon' => 'tag.png',
                'icon_opacity' => 'opacity-10'
            ],
            [
                'title' => 'TOTAL KEYWORD',
                'value' => $totalKeyword,
                'note'  => 'Data',
                'note_color' => 'text-[#8B5A2B]',
                'top_line' => 'bg-[#E6C8A8]',
                'icon' => 'keyword_.png',
                'icon_opacity' => 'opacity-10'
            ],
        ];

        return view('admin.dashboard', compact(
            'summaryCards',
            'highestEngagement',
            'topHashtags',
            'topKeywords',
            'weeklyChart'
        ));
    }
}