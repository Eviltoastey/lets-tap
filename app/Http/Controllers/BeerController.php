<?php

namespace App\Http\Controllers;

use App\Http\Resources\Beer as BeerResource;
use App\Http\Resources\BeerCollection;
use App\Models\Beer;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBeer;
use App\Http\Requests\UpdateBeer;

class BeerController extends Controller
{

    public function index()
    {
        // get all user records
       $beers = Beer::paginate();

       // pass all eloquent objects to user collection
       return new BeerCollection($beers);
    }

    public function store(StoreBeer $request)
    {
        // Retrieve the validated input data...
        $request->validated();

        $beer = new Beer($request->all());
        $beer->save();
      
        $beer->flavours()->sync($request->input('flavours'));
        $beer->styles()->sync($request->input('styles'));
        
        return (new BeerResource($beer))
        ->additional([
            'meta' => [
                'success' => true,
                'message' => "beer created"
            ]
        ]);

    }

    public function show($id)
    {
        // get database model
        $beer = Beer::find($id);
        
        // get resource for database model
        return new BeerResource($beer);
    }

    public function update(UpdateBeer $request, $id)
    {
        // Retrieve the validated input data...
        $request->validated();

        $beer = Beer::find($id);
        $beer->update($request->all());
        
        $beer->flavours()->sync($request->input('flavours'));
        $beer->styles()->sync($request->input('styles'));

        return (new BeerResource($beer))
        ->additional([
            'meta' => [
                'success' => true,
                'message' => "beer updated"
            ]
        ]);
    }

    public function destroy($id)
    {
        return Beer::destroy($id);
    }
}
