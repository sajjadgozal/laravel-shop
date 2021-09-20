<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'slug' => Str::random(10),
            'price'=> $this->faker->randomNumber(3),
            'description' => $this->faker->paragraph(),
            'inventory' =>  $this->faker->randomNumber(3),
            'category_id' => 1 ,
            'created_by_id'=> 1 ,
            'image_url'=> $this->faker->imageUrl(640, 640, 'cats', true, 'Faker', false),
        ];
    }
}
