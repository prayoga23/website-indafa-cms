<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Page;

class PageController extends Controller
{
    public function show($slug)
    {
        $page = Page::where('slug',$slug)
            ->firstOrFail();

        $otherPages = Page::query()
            ->where('id','!=',$page->id)
            ->orderBy('title')
            ->get();

        return view(
            'frontend.page.show',
            compact(
                'page',
                'otherPages'
            )
        );
    }
}
