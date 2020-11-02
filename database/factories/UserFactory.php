<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Beer;
use App\Models\Bar;
use App\Models\Brewery;
use App\Models\Store;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

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
            'name' => 'admin',
            'email' => $this->faker->unique()->safeEmail,
            'age' => random_int(0,20),
            'description' => Str::random(100),
            'phone' => random_int(0,9),
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // needs to be changed to ENV var
            'remember_token' => Str::random(10),
            'beer_id' => Beer::factory(),
            'bar_id' => Bar::factory(),
            'brewery_id' => Brewery::factory(),
            'store_id' => Store::factory()
        ];
    }
}
