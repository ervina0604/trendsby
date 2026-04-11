<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EngagementController;
use App\Http\Controllers\Filter;

// PUBLIC
Route::get('/', function () {
    return redirect('/dashboard');
});

Route::get('/dashboard', function () {
    return view('public.dashboard');
})->name('dashboard');

Route::get('/hashtag', function () {
    return view('public.hashtag');
})->name('hashtag');

// Ubah nama route untuk detail hashtag agar tidak duplikat
Route::get('/detail-hashtag', function () {
    return view('public.detail_hashtag');
})->name('detail_hashtag');

// Ubah nama route untuk detail keyword agar tidak duplikat
Route::get('/detail-keyword', function () {
    return view('public.detail_keyword');
})->name('detail_keyword');

Route::get('/keyword', function () {
    return view('public.keyword');
})->name('keyword');

Route::get('/tentang', function () {
    return view('public.tentang');
})->name('tentang');

// Halaman untuk Terms and Conditions
Route::get('/tnc', function () {
    return view('public.terms');
})->name('terms');

// Routes for engagement and filter
Route::get('/engagement', [EngagementController::class, 'show'])->name('engagement.show');
Route::get('/filter', [Filter::class, 'show'])->name('filter.show');

// Admin Routes
Route::prefix('admin')->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/hashtag', function () {
        return view('admin.hashtag');
    })->name('admin.hashtag');

    Route::get('/keyword', function () {
        return view('admin.keyword');
    })->name('admin.keyword');

    Route::get('/import', function () {
        return view('admin.import');
    })->name('admin.import');

    Route::get('/kelola', function () {
        return view('admin.kelola');
    })->name('admin.kelola');

    Route::get('/input', function () {
        return view('admin.input');
    })->name('admin.input');

    Route::get('/filter', function () {
        return view('admin.filter');
    })->name('admin.filter');

    Route::get('/engagement', function () {
        return view('admin.engagement');
    })->name('admin.engagement');
    
    // Additional Routes for viewing details
    Route::get('/detail_hashtag', function () {
        return view('admin.detail_hashtag');
    })->name('admin.detail_hashtag');

    Route::get('/detail_keyword', function () {
        return view('admin.detail_keyword');
    })->name('admin.detail_keyword');

    Route::get('/detail_log', function () {
        return view('admin.detail_log');
    })->name('admin.detail_log');
});

// Export Routes for Hashtags
Route::get('/export/hashtag/csv', function () {
    return 'Export CSV hashtag';
});
Route::get('/export/hashtag/excel', function () {
    return 'Export Excel hashtag';
});
Route::get('/export/hashtag/pdf', function () {
    return 'Export PDF hashtag';
});

// Export Routes for Keywords
Route::get('/export/keyword/csv', function () {
    return 'Export CSV keyword';
});
Route::get('/export/keyword/excel', function () {
    return 'Export Excel keyword';
});
Route::get('/export/keyword/pdf', function () {
    return 'Export PDF keyword';
});