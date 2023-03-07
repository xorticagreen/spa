<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{

    protected $model = Category::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //'name' =>  fake()->sentence(2),
            'name' =>  strtoupper(fake()->word),
            'description' => fake()->realText( 10),
            'icon' => fake()->imageUrl(60,60,NULL, FALSE, NULL, TRUE),
            'image' => fake()->imageUrl(200,200,NULL, FALSE, NULL, TRUE),
            'sort_order' => random_int(10,100),
        ];
    }
}
