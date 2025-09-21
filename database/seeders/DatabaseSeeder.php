<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Comment;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = User::factory(50)->create();

        // 200 articles authored by random users
        $articles = Article::factory(200)->make()->each(function ($article) use ($users) {
            $article->user_id = $users->random()->id;
            $article->save();
        });

        // 1000 comments linked to random articles and users
        Comment::factory(1000)->make()->each(function ($comment) use ($users, $articles) {
            $comment->user_id = $users->random()->id;
            $comment->article_id = $articles->random()->id;
            $comment->save();
        });
    }
}
