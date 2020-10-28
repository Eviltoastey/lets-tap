<?php

namespace Database\Factories;

use App\Models\Style;
use Illuminate\Database\Eloquent\Factories\Factory;

class StyleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Style::class;

    /**
     * Beer styles
     *
     * @var array
     */
    protected $styles = [
        'Imperial stout',
        'IPA',
        'DIPA',
        'New england IPA',
        'Sour',
        'Pastry sour',
        'Double pastry sour',
        'Pilsner',
        'Lager',
        'Seltzer',
        'Pastry stout',
        'Imperial sour',
        'Kriek'
    ];

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->randomElement($this->styles)
        ];
    }
}
