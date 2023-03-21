<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Posts>
 */
class PostsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $photo_path = fake()->image(storage_path('/app/public'), 1024, 600);
        $photo_path = pathinfo($photo_path);
        $photo_path = '/photos/' . $photo_path['basename'];

        return [
            'title' => fake()->sentence(rand(4, 15)),
            'content' => '<p>' . implode('</p><p>', fake()->paragraphs(rand(1, 15))) . '</p>',
            // 'photo' => 'https://picsum.photos/1024/600/?q='.rand(0, 500000),
            'photo' => $photo_path,
            'comments_count' => rand(0, 33),
            'user_id' => rand(1, 11)
        ];
    }
}
