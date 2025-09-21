<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function show(Article $article)
    {
        $article = Article::with('comments.user')->findOrFail($article->id);

        return view('articles.show', compact('article'));
    }
}
