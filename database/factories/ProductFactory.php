<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        return [
            'name'=> $this->faker->word,
            'image' => $this->faker->image(storage_path('images'), 300, 400, null, false), 
            'description' => $this->faker->sentence(rand(6, 7)),
            'price' => $this->faker->randomFloat(2, 10, 100),
            'category_id' => \App\Models\Category::factory(),
            'user_id' => \App\Models\User::find(1),
        ];
    }
}
