<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\Style;
use \App\Models\Beer;
use App\Models\Flavour;
use \App\Models\Location;
use App\Models\UserPicture;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(5)
        ->has(Style::factory()->count(5), 'styles')
        ->has(Location::factory()->count(1), 'location')
        ->has(UserPicture::factory()->count(5), 'pictures')
        ->create();

        Beer::factory()
        ->has(Flavour::factory()->count(5), 'flavours')
        ->has(Style::factory()->count(5), 'styles')
        ->create();
    }
}
