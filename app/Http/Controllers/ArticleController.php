<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ArticleController extends Controller
{
    public function show(Article $article)
    {
        $cacheKey = 'article_' . $article->id;

        $article = Cache::remember($cacheKey, 60, function () use ($article) {
            return Article::with('comments.user')->find($article->id);
        });

        return view('articles.show', compact('article'));
    }
}
