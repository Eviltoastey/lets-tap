<?php

namespace Database\Factories;

use App\Models\Flavour;
use Illuminate\Database\Eloquent\Factories\Factory;

class FlavourFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Flavour::class;

    protected $flavours = [
        'Tangy',
        'Sour',
        'Salty',
        'Caramel',
        'Chocolate',
        'Fruity',
        'Dry',
        'Grape',
        'Mango',
        'Banana',
        'Wheat',
        'Piss',
        'Zengy',
        'Sweet',
        'Bitter',
        'Hoppy',
        'Grassy'
    ];

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->randomElement($this->flavours)
        ];
    }
}
