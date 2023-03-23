<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Products>
 */
class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // $photo_path = fake()->image(storage_path('/app/public'), 1024, 1024, 'products', true, true, 'electronics', true, 'jpg');
        // $photo_path = pathinfo($photo_path);
        // $photo_path = '/photos/' . $photo_path['basename'];

        return [
            'name' => fake()->sentence(),
            'sku' => fake()->ean13(),
            // 'photo' => $photo_path,
            'photo' => 'https://picsum.photos/768/768/?q='.rand(0, 5000),
            'warehouse_qty' => rand(0, 30),
            'price' => rand(0, 5000) . '.' . rand(10, 99)
        ];
    }
}
