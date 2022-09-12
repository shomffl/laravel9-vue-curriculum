<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{

    // protected $model = Post::class;

    public function definition()
    {
        return [
            "title" => $this->faker->word,
            "body" => $this->faker->paragraph
        ];
    }
}
