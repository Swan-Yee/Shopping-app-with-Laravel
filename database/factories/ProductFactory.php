<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'name'=>$this->faker->name,
            'slug'=>uniqid(time()),
            'category_id'=>Category::all()->random()->id,
            'image'=>'image/default.png',
            'description'=>$this->faker->text,
            'price'=>1000,
            'view_count'=>1000
        ];
    }
}
