<?php

namespace Database\Factories;

use App\Models\Beer;
use App\Models\Brewery;
use Illuminate\Database\Eloquent\Factories\Factory;

class BeerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Beer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'average_rating' => 1.0,
            'brewery_id' => Brewery::factory()   
        ];
    }
}
