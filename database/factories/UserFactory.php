<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Beer;
use App\Models\Bar;
use App\Models\Brewery;
use App\Models\Store;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'age' => random_int(0,20),
            'description' => Str::random(100),
            'phone' => random_int(0,9),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'beer_id' => Beer::factory(),
            'bar_id' => Bar::factory(),
            'brewery_id' => Brewery::factory(),
            'store_id' => Store::factory(),
        ];
    }
}
