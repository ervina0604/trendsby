<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post; // Assuming you have a Post model

class Filter extends Controller
{
    public function show(Request $request)
    {
        $query = Post::query();

        // Apply date range filter
        if ($request->has('start_date') && $request->has('end_date')) {
            $query->whereBetween('tanggal_post', [$request->start_date, $request->end_date]);
        }

        // Apply account filter - assuming account is user name, need join
        // if ($request->has('account')) {
        //     $query->join('users', 'posts.id_user', '=', 'users.id')->whereIn('users.name', $request->account);
        // }

        // Apply hashtag filter - not in posts table
        // if ($request->has('hashtag')) {
        //     // Need to handle hashtags separately
        // }

        // Get the filtered content with pagination
        $filteredData = $query->paginate(10);

        return view('admin.filter', compact('filteredData'));
    }
}