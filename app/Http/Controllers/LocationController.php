<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLocation;
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

    public function store(StoreLocation $request)
    {
         // Retrieve the validated input data...
         $request->validated();

         $location = new Location($request->all());
         $location->save();
         
         return new LocationResource($location);    
    }

    public function update(UpdateLocation $request, int $id)
    {
       // Retrieve the validated input data...
       $request->validated();

        $location = Location::find($id);

        if (!$location) {
            return response([
                'message' => 'Location could not be found'
            ], 404);
        };

         $location->update($request->all());
         
         return new LocationResource($location);   
    }

}
