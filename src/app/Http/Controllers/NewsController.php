<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\NewsCategory;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::published()
            ->latest('published_at')
            ->paginate(9);

        $categories = NewsCategory::active()->get();
        $latestNews = News::published()->latest('published_at')->take(5)->get();

        return view('news.index', compact('news', 'categories', 'latestNews'));
    }

    public function show($slug)
    {
        $article = News::where('slug', $slug)->published()->firstOrFail();
        $relatedNews = News::where('news_category_id', $article->news_category_id)
            ->where('id', '!=', $article->id)
            ->published()
            ->take(4)
            ->get();

        return view('news.show', compact('article', 'relatedNews'));
    }

    public function category($slug)
    {
        $category = NewsCategory::where('slug', $slug)->active()->firstOrFail();
        $news = News::published()
            ->where('news_category_id', $category->id)
            ->latest('published_at')
            ->paginate(9);

        $categories = NewsCategory::active()->get();
        $latestNews = News::published()->latest('published_at')->take(5)->get();

        return view('news.index', compact('news', 'categories', 'latestNews', 'category'));
    }
}
