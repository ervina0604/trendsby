<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keyword;

class InstagramController extends Controller
{
    public function index()
    {
        $json = file_get_contents(public_path('data/pedulisungaisurabaya_data.json'));

        $posts = json_decode($json, true);

        $totalPosts = count($posts);


        $hashtags = [];

        foreach ($posts as $post) {

            if (isset($post['hashtags']) && is_array($post['hashtags'])) {

                foreach ($post['hashtags'] as $tag) {

                    $tag = strtolower(trim($tag, '# '));

                    if (empty($tag)) {
                        continue;
                    }

                    $hashtags[$tag] = ($hashtags[$tag] ?? 0) + 1;
                }
            }
        }

        arsort($hashtags);

        $topHashtags = array_slice($hashtags, 0, 10, true);

        $popularHashtag = array_key_first($topHashtags);



        $keywords = [];

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

            if (empty($caption)) {
                continue;
            }

            $caption = preg_replace('/http\S+/', '', $caption);

            $caption = preg_replace('/[#@]\w+/', '', $caption);

            $caption = preg_replace('/[^\p{L}\p{N}\s]/u', ' ', $caption);

            $words = preg_split('/\s+/', $caption);

            foreach ($words as $word) {

                $word = trim($word);

                if (empty($word)) {
                    continue;
                }

                if (strlen($word) < 4) {
                    continue;
                }

                if (is_numeric($word)) {
                    continue;
                }

                if (in_array($word, $stopwords)) {
                    continue;
                }

                $keywords[$word] = ($keywords[$word] ?? 0) + 1;
            }
        }

        arsort($keywords);

        $topKeywords = array_slice($keywords, 0, 10, true);

        $dominantKeyword = array_key_first($topKeywords);


        $totalLikes = 0;

        $totalComments = 0;

        $topEngagement = [
            'engagement' => 0,
            'caption' => '',
            'image' => ''
        ];

        foreach ($posts as $post) {

            $likes = $post['likesCount'] ?? 0;

            $comments = $post['commentsCount'] ?? 0;

            $engagement = $likes + $comments;

            $totalLikes += $likes;

            $totalComments += $comments;

            if ($engagement > $topEngagement['engagement']) {

                $topEngagement = [
                    'engagement' => $engagement,
                    'caption' => $post['caption'] ?? '',
                    'image' => $post['displayUrl'] ?? ''
                ];
            }
        }


        $insight = "Percakapan publik didominasi isu '{$dominantKeyword}' dengan hashtag populer #{$popularHashtag} terkait kondisi Sungai Surabaya.";

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
            'insight'
        ));
    }


    public function hashtag()
    {
        $json = file_get_contents(public_path('data/pedulisungaisurabaya_data.json'));

        $posts = json_decode($json, true);

        $hashtags = [];

        foreach ($posts as $post) {

            if (isset($post['hashtags']) && is_array($post['hashtags'])) {

                foreach ($post['hashtags'] as $tag) {

                    $tag = strtolower(trim($tag, '# '));

                    if (empty($tag)) {
                        continue;
                    }

                    $hashtags[$tag] = ($hashtags[$tag] ?? 0) + 1;
                }
            }
        }

        arsort($hashtags);

        $topHashtags = array_slice($hashtags, 0, 20, true);

        return view('public.hashtag', compact('topHashtags'));
    }


    public function keyword()
    {
        $json = file_get_contents(public_path('data/pedulisungaisurabaya_data.json'));

        $posts = json_decode($json, true);

        $keywords = [];

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

            if (empty($caption)) {
                continue;
            }

            $caption = preg_replace('/http\S+/', '', $caption);

            $caption = preg_replace('/[#@]\w+/', '', $caption);

            $caption = preg_replace('/[^\p{L}\p{N}\s]/u', ' ', $caption);

            $words = preg_split('/\s+/', $caption);

            foreach ($words as $word) {

                $word = trim($word);

                if (empty($word)) {
                    continue;
                }

                if (strlen($word) < 4) {
                    continue;
                }

                if (is_numeric($word)) {
                    continue;
                }

                if (in_array($word, $stopwords)) {
                    continue;
                }

                $keywords[$word] = ($keywords[$word] ?? 0) + 1;
            }
        }

        arsort($keywords);

        $topKeywords = array_slice($keywords, 0, 20, true);

        $dominantKeyword = array_key_first($topKeywords);

        return view('public.keyword', compact(
            'topKeywords',
            'dominantKeyword'
        ));
    }
}