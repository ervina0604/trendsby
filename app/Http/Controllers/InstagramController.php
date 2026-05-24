<?php

namespace App\Http\Controllers;

use App\Exports\KeywordsExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class InstagramController extends Controller
{
    public function index()
    {
        $json  = file_get_contents(public_path('data/pedulisungaisurabaya_data.json'));
        $posts = json_decode($json, true);

        $totalPosts = count($posts);

        $hashtags = [];
        foreach ($posts as $post) {
            if (isset($post['hashtags']) && is_array($post['hashtags'])) {
                foreach ($post['hashtags'] as $tag) {
                    $tag = strtolower(trim($tag, '# '));
                    if (empty($tag)) continue;
                    $hashtags[$tag] = ($hashtags[$tag] ?? 0) + 1;
                }
            }
        }
        arsort($hashtags);
        $topHashtags    = array_slice($hashtags, 0, 10, true);
        $popularHashtag = array_key_first($topHashtags);

        $keywords  = [];
        $stopwords = [
            'dan','yang','untuk','dari','dengan','atau','karena',
            'pada','dalam','adalah','ini','itu','agar','juga',
            'lebih','akan','kami','kita','mereka','bagi','jadi',
            'telah','sudah','belum','bisa','dapat','terhadap',
            'oleh','ke','di','sebagai','saat','para','tentang',
            'sebuah','hingga','namun','tetapi','masih','supaya',
            'guna','menuju','setelah','sebelum','terjadi',
            'the','and','for','from','with',
            'instagram','post','repost','video',
            'foto','link','https','com','www'
        ];
        
        foreach ($posts as $post) {
            $caption = strtolower($post['caption'] ?? '');
            if (empty($caption)) continue;
            
            $caption = preg_replace('/http\S+/', '', $caption);
            $caption = preg_replace('/[#@]\w+/', '', $caption);
            $caption = preg_replace('/[^\p{L}\p{N}\s]/u', ' ', $caption);
            $words   = preg_split('/\s+/', $caption);
            
            foreach ($words as $word) {
                $word = trim($word);
                if (empty($word) || strlen($word) < 4 || is_numeric($word) || in_array($word, $stopwords)) continue;
                $keywords[$word] = ($keywords[$word] ?? 0) + 1;
            }
        }
        arsort($keywords);
        $topKeywords     = array_slice($keywords, 0, 10, true);
        $dominantKeyword = array_key_first($topKeywords);

        $totalLikes    = 0;
        $totalComments = 0;
        $topEngagement = ['engagement' => 0, 'caption' => '', 'image' => ''];
        
        foreach ($posts as $post) {
            $likes      = $post['likesCount'] ?? 0;
            $comments   = $post['commentsCount'] ?? 0;
            $engagement = $likes + $comments;
            
            $totalLikes    += $likes;
            $totalComments += $comments;
            
            if ($engagement > $topEngagement['engagement']) {
                $topEngagement = [
                    'engagement' => $engagement,
                    'caption'    => $post['caption'] ?? '',
                    'image'      => $post['displayUrl'] ?? ''
                ];
            }
        }

        $insight = "Percakapan publik didominasi isu '{$dominantKeyword}' dengan hashtag populer #{$popularHashtag} terkait kondisi Sungai Surabaya.";

        // Baca sentimen dari hasil_analisis.json
        $sentimentSummary = ['positive' => 0, 'neutral' => 0, 'negative' => 0];
        if (file_exists(public_path('data/hasil_analisis.json'))) {
            $analysisJson     = file_get_contents(public_path('data/hasil_analisis.json'));
            $analysis         = json_decode($analysisJson, true);
            $sentimentSummary = $analysis['sentiment_summary'] ?? $sentimentSummary;
        }

        return view('public.dashboard', compact(
            'posts',
            'totalPosts',
            'topHashtags',
            'popularHashtag',
            'topKeywords',
            'dominantKeyword',
            'totalLikes',
            'totalComments',
            'topEngagement',
            'insight',
            'sentimentSummary'
        ));
    }

    public function hashtag()
    {
        $json  = file_get_contents(public_path('data/pedulisungaisurabaya_data.json'));
        $posts = json_decode($json, true);

        $hashtags = [];
        foreach ($posts as $post) {
            if (isset($post['hashtags']) && is_array($post['hashtags'])) {
                foreach ($post['hashtags'] as $tag) {
                    $tag = strtolower(trim($tag, '# '));
                    if (empty($tag)) continue;
                    $hashtags[$tag] = ($hashtags[$tag] ?? 0) + 1;
                }
            }
        }
        arsort($hashtags);
        $topHashtags = array_slice($hashtags, 0, 100, true);

        return view('public.hashtag', compact('topHashtags'));
    }

    // --- FUNGSI KEYWORD YANG SUDAH DIPERBAIKI (DITAMBAH FILTER) ---
    public function keyword(Request $request)
    {
        $json  = file_get_contents(public_path('data/pedulisungaisurabaya_data.json'));
        $posts = json_decode($json, true);

        $keywords  = [];
        $stopwords = [
            'dan','yang','untuk','dari','dengan','atau','karena',
            'pada','dalam','adalah','ini','itu','agar','juga',
            'lebih','akan','kami','kita','mereka','bagi','jadi',
            'telah','sudah','belum','bisa','dapat','terhadap',
            'oleh','ke','di','sebagai','saat','para','tentang',
            'sebuah','hingga','namun','tetapi','masih','supaya',
            'guna','menuju','setelah','sebelum','terjadi',
            'the','and','for','from','with',
            'instagram','post','repost','video',
            'foto','link','https','com','www'
        ];
        
        foreach ($posts as $post) {
            $caption = strtolower($post['caption'] ?? '');
            if (empty($caption)) continue;
            
            $caption = preg_replace('/http\S+/', '', $caption);
            $caption = preg_replace('/[#@]\w+/', '', $caption);
            $caption = preg_replace('/[^\p{L}\p{N}\s]/u', ' ', $caption);
            $words   = preg_split('/\s+/', $caption);
            
            foreach ($words as $word) {
                $word = trim($word);
                if (empty($word) || strlen($word) < 4 || is_numeric($word) || in_array($word, $stopwords)) continue;
                $keywords[$word] = ($keywords[$word] ?? 0) + 1;
            }
        }
        arsort($keywords);
        $topKeywords     = array_slice($keywords, 0, 20, true);
        $dominantKeyword = array_key_first($topKeywords);

        // LOGIKA FILTER
        $filterCategory = $request->get('category');
        if ($filterCategory) {
            $topKeywords = array_filter($topKeywords, function($count, $word) use ($filterCategory) {
                $category = 'ENVIRONMENT';
                if (str_contains($word, 'sampah') || str_contains($word, 'plastik') || str_contains($word, 'limbah')) {
                    $category = 'POLLUTION';
                } elseif (str_contains($word, 'banjir') || str_contains($word, 'hujan')) {
                    $category = 'DISASTER';
                }
                return $category === $filterCategory;
            }, ARRAY_FILTER_USE_BOTH);
        }

        return view('public.keyword', compact('topKeywords', 'dominantKeyword'));
    }

    // --- FUNGSI EXPORT YANG BARU DITAMBAHKAN ---
    public function exportKeyword(Request $request)
    {
        $json  = file_get_contents(public_path('data/pedulisungaisurabaya_data.json'));
        $posts = json_decode($json, true);

        $keywords  = [];
        $stopwords = [
            'dan','yang','untuk','dari','dengan','atau','karena','pada','dalam','adalah','ini','itu','agar','juga','lebih','akan','kami','kita','mereka','bagi','jadi','telah','sudah','belum','bisa','dapat','terhadap','oleh','ke','di','sebagai','saat','para','tentang','sebuah','hingga','namun','tetapi','masih','supaya','guna','menuju','setelah','sebelum','terjadi','the','and','for','from','with','instagram','post','repost','video','foto','link','https','com','www'
        ];
        
        foreach ($posts as $post) {
            $caption = strtolower($post['caption'] ?? '');
            if (empty($caption)) continue;
            $caption = preg_replace('/http\S+/', '', $caption);
            $caption = preg_replace('/[#@]\w+/', '', $caption);
            $caption = preg_replace('/[^\p{L}\p{N}\s]/u', ' ', $caption);
            $words   = preg_split('/\s+/', $caption);
            foreach ($words as $word) {
                $word = trim($word);
                if (empty($word) || strlen($word) < 4 || is_numeric($word) || in_array($word, $stopwords)) continue;
                $keywords[$word] = ($keywords[$word] ?? 0) + 1;
            }
        }
        arsort($keywords);
        $topKeywords = array_slice($keywords, 0, 20, true);

        // Menangkap filter kategori jika ada agar excel sesuai layar
        $filterCategory = $request->get('category');
        if ($filterCategory) {
            $topKeywords = array_filter($topKeywords, function($count, $word) use ($filterCategory) {
                $category = 'ENVIRONMENT';
                if (str_contains($word, 'sampah') || str_contains($word, 'plastik') || str_contains($word, 'limbah')) {
                    $category = 'POLLUTION';
                } elseif (str_contains($word, 'banjir') || str_contains($word, 'hujan')) {
                    $category = 'DISASTER';
                }
                return $category === $filterCategory;
            }, ARRAY_FILTER_USE_BOTH);
        }

        return Excel::download(new KeywordsExport($topKeywords), 'keyword_performance.xlsx');
    }

    public function sentiment()
    {
        $json     = file_get_contents(public_path('data/hasil_analisis.json'));
        $analysis = json_decode($json, true);

        $sentimentSummary = $analysis['sentiment_summary'] ?? [];
        $totalPosts       = $analysis['total_posts'] ?? 0;
        $details          = $analysis['details'] ?? [];

        $positif = array_filter($details, fn($d) => $d['sentiment'] === 'positive');
        $netral  = array_filter($details, fn($d) => $d['sentiment'] === 'neutral');
        $negatif = array_filter($details, fn($d) => $d['sentiment'] === 'negative');

        return view('public.sentiment', compact(
            'sentimentSummary',
            'totalPosts',
            'positif',
            'netral',
            'negatif'
        ));
    }

    public function detailHashtag(Request $request)
    {
        $json  = file_get_contents(public_path('data/pedulisungaisurabaya_data.json'));
        $posts = json_decode($json, true);

        $hashtags = [];
        foreach ($posts as $post) {
            if (isset($post['hashtags']) && is_array($post['hashtags'])) {
                foreach ($post['hashtags'] as $tag) {
                    $tag = strtolower(trim($tag, '# '));
                    if (empty($tag)) continue;
                    $hashtags[$tag] = ($hashtags[$tag] ?? 0) + 1;
                }
            }
        }
        arsort($hashtags);

        // Search
        $search = $request->get('search');
        if ($search) {
            $hashtags = array_filter($hashtags, fn($tag) =>
                str_contains($tag, strtolower($search)), ARRAY_FILTER_USE_KEY
            );
        }

        // Paginasi
        $perPage     = 15;
        $page        = (int) $request->get('page', 1);
        $total       = count($hashtags);
        
        // Mencegah error division by zero jika tidak ada data sama sekali
        $totalPages  = $total > 0 ? (int) ceil($total / $perPage) : 1; 
        
        $page        = max(1, min($page, $totalPages));
        $allHashtags = array_slice($hashtags, ($page - 1) * $perPage, $perPage, true);

        return view('public.detail_hashtag', compact(
            'allHashtags', 'total', 'page', 'totalPages', 'perPage', 'search'
        ));
    }
}