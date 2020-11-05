<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBrewery;
use App\Http\Requests\UpdateBrewery;
use App\Http\Resources\BeerCollection;
use App\Http\Resources\Brewery as BreweryResource;
use App\Http\Resources\BreweryCollection;
use App\Models\Beer;
use App\Models\Brewery;
use App\Models\User;

class BreweryController extends Controller
{
    public function index()
    {
        $breweries = Brewery::paginate();

        return new BreweryCollection($breweries);
    }

    public function store(StoreBrewery $request)
    {
         // Retrieve the validated input data...
         $request->validated();

         $brewery = new Brewery($request->all());
         $brewery->save();
         
         return new BreweryResource($brewery); 
    }

    public function show($id)
    {
        $brewery = Brewery::find($id);

        if (!$brewery) {
            return response([
                'message' => 'Brewery could not be found'
            ], 404);
        };

        return new BreweryResource($brewery);
    }


    public function update(UpdateBrewery $request, $id)
    {
        $brewery = Brewery::find($id);

        if (!$brewery) {
            return response([
                'message' => 'Brewery could not be found'
            ], 404);
        };

         // Retrieve the validated input data...
         $request->validated();

         $brewery->update($request->all());
         
         return new BreweryResource($brewery); 
    }

    public function destroy($id)
    {
        $brewery = Brewery::destroy($id);

        if (!$brewery) {
            return response([
                'message' => 'Brewery could not be found'
            ], 404 ); 
        }

        return response([
            'message' => 'Brewery and related beers deleted'
        ], 200);
    }
}
