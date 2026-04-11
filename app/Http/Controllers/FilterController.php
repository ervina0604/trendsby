<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content; // Assuming you have a Content model

class FilterController extends Controller
{
    public function show(Request $request)
    {
        $query = Content::query();

        // Apply date range filter
        if ($request->has('start_date') && $request->has('end_date')) {
            $query->whereBetween('date', [$request->start_date, $request->end_date]);
        }

        // Apply account filter
        if ($request->has('account')) {
            $query->whereIn('account', $request->account);
        }

        // Apply hashtag filter
        if ($request->has('hashtag')) {
            $query->whereIn('hashtag', $request->hashtag);
        }

        // Get the filtered content
        $filteredData = $query->get();

        return view('admin.filter', compact('filteredData'));
    }
}