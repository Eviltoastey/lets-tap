<?php

namespace Database\Factories;

use App\Models\Brewery;
use Illuminate\Database\Eloquent\Factories\Factory;

class BreweryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Brewery::class;

    protected $breweries = [
        'Het Uiltje',
        'Kinnegan',
        'Heineken',
        'Brand',
        'Omnipollo',
        'De Moll',
        'Hoegaarden',
        'Paulaner',
        'Erdinger',
        'Amstel',
        'Evil Twin',
        'Hertog Jan',
        'Borg Brugghus',
    ];

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->randomElement($this->breweries),
            'adres' => $this->faker->address,
            'city' => $this->faker->city,
            'postal_code' => $this->faker->postcode,
            'maps_link' => $this->faker->url
        ];
    }
}
