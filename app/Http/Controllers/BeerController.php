<?php

namespace App\Http\Controllers;

use App\Http\Resources\Beer as BeerResource;
use App\Http\Resources\BeerCollection;
use App\Models\Beer;
use App\Http\Requests\StoreBeer;
use App\Http\Requests\UpdateBeer;
use App\Models\Flavour;
use App\Models\User;

class BeerController extends Controller
{

    public function index()
    {
        $beers = Beer::paginate();

        return new BeerCollection($beers);
    }

    public function show($id)
    {
        $beer = Beer::find($id);

        if (!$beer) {
            return response([
                'message' => 'Beer could not be found'
            ], 404);
        };

        return new BeerResource($beer);
    }

    public function store(StoreBeer $request)
    {
        // Retrieve the validated input data...
        $request->validated();

        $beer = new Beer($request->all());
        $beer->save();
      
        $beer->flavours()->sync($request->input('flavours'));
        $beer->styles()->sync($request->input('styles'));
        
        return new BeerResource($beer);
    }

    public function update(UpdateBeer $request, $id)
    {
        $beer = Beer::find($id);

        if (!$beer) {
            return response([
                'message' => 'Beer could not be found'
            ], 404);
        };

        // Retrieve the validated input data...
        $request->validated();

        $beer->update($request->all());
        
        $beer->flavours()->sync($request->input('flavours'));
        $beer->styles()->sync($request->input('styles'));

        return new BeerResource($beer);
    }

    public function destroy($id)
    {
        $beer = Beer::find($id);
    
        if (!$beer) {
            return response([
                'message' => 'Beer could not be found'
            ], 404 ); 
        }

        $beer->flavours()->detach();
        $beer->styles()->detach();

        $beer::destroy($id);

        return response([
            'message' => 'Beer deleted'
        ], 200);
    }
}
