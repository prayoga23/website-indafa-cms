<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::query()
            ->latest()
            ->paginate(9);

        return view(
            'frontend.news.index',
            compact('news')
        );
    }

    public function show($slug)
    {
        $news = News::where('slug',$slug)
            ->firstOrFail();

        $latestNews = News::latest()
            ->where('id','!=',$news->id)
            ->take(5)
            ->get();

        $relatedNews = News::query()
            ->where('id','!=',$news->id)
            ->latest()
            ->take(3)
            ->get();

        return view(
            'frontend.news.show',
            compact(
                'news',
                'latestNews',
                'relatedNews'
            )
        );
    }
}
