<?php

namespace App\Http\Controllers;

use App\Models\Engagement;
use Illuminate\Http\Request;

class EngagementController extends Controller
{
    public function show(Request $request)
    {
        // Mulai query untuk mendapatkan data Engagement
        $query = Engagement::query();

        // Jika ada filter tanggal, terapkan filter berdasarkan tanggal
        if ($request->has('start_date') && $request->has('end_date')) {
            $query->whereBetween('date', [$request->start_date, $request->end_date]);
        }

        // Jika ada filter akun, terapkan filter berdasarkan akun
        if ($request->has('account')) {
            $query->whereIn('account', $request->account);
        }

        // Ambil data yang sudah difilter
        $engagementData = $query->get();

        // Kirim data ke tampilan
        return view('admin.engagement', compact('engagementData'));
    }
}