<?php

namespace App\Observers;

use App\Models\Location;
use App\Models\User;

class UserObserver
{
    /**
     * Handle the user "created" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function created(User $user)
    {
        $location = new Location([
            "lat" => 1.0,
            "lon" => -1.0,
            "user_id" => $user->id
        ]);

        $location->save();
        
    }
}
