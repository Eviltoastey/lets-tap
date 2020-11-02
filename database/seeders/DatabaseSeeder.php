<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\Style;
use \App\Models\Beer;
use App\Models\Flavour;
use \App\Models\Location;
use App\Models\UserPicture;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{

    private $roles = [
        'admin',
        'user',
        'deactivated',
        'banned'
    ];

    private $permissions = [
        'crud all',
    ];

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::factory()->count(1)
        ->has(Style::factory()->count(5), 'styles')
        ->has(Location::factory()->count(1), 'location')
        ->has(UserPicture::factory()->count(5), 'pictures')
        ->create();

        Beer::factory()
        ->has(Flavour::factory()->count(5), 'flavours')
        ->has(Style::factory()->count(5), 'styles')
        ->create();

        foreach($this->roles as $role) {
            Role::create([
                'name' => $role,
            ]);
        }

        foreach($this->permissions as $permission) {
            Permission::create([
                'name' => $permission,
            ]);
        }
        
        $user = User::find(1);
        $user->assignRole('admin');
    }
}
