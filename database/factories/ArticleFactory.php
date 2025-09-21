<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence(6, true);

        return [
            'user_id' => User::factory(),
            'title'   => $title,
            'slug'    => Str::slug($title) . '-' . fake()->unique()->randomNumber(),
            'content' => fake()->paragraphs(5, true),
        ];
    }
}
