<?php

namespace Database\Factories;

use App\Models\News;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = News::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->realText(rand(5,25)),
            'text' => $this->faker->realText(rand(10,300)),
            'isPrivate' => false,
            'image' => null,
            'category_id' => $this->faker->numberBetween(1,2)
        ];
    }
}
