<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateLocation;
use App\Models\Location;
use App\Http\Resources\Location as LocationResource;
use Illuminate\Http\Client\Request;

class LocationController extends Controller
{
    public function show(int $id)
    {
        $location = Location::find($id);

        if (!$location) {
            return response([
                'message' => 'Location could not be found'
            ], 404);
        };

        return new LocationResource($location);
    }

    public function update(UpdateLocation $request, int $id)
    {
        $location = Location::find(['user' => 1]);

        if (!$location) {
            $location = new Location([
                'lat' => 1.0,
                'lon' => -1.0
            ]);
        };

         // Retrieve the validated input data...
         $request->validated();

         $location->update($request->all());
         
         return new LocationResource($location);   
    }

}
