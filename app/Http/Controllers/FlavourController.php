<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFlavour;
use App\Http\Requests\UpdateFlavour;
use App\Http\Resources\FlavourCollection;
use App\Http\Resources\Flavour as FlavourResource;
use App\Models\Flavour;

class FlavourController extends Controller
{
    public function index()
    {
        $flavours = Flavour::paginate();

        return new FlavourCollection($flavours);
    }

    public function store(StoreFlavour $request)
    {
         // Retrieve the validated input data...
         $request->validated();

         $flavour = new Flavour($request->all());
         $flavour->save();
         
         return new FlavourResource($flavour);    
    }

    public function show(int $id)
    {
        $flavour = Flavour::find($id);

        if (!$flavour) {
            return response([
                'message' => 'Flavour could not be found'
            ], 404);
        };

        return new FlavourResource($flavour);
    }


    public function update(UpdateFlavour $request, $id)
    {
        $flavour = Flavour::find($id);

        if (!$flavour) {
            return response([
                'message' => 'Flavour could not be found'
            ], 404);
        };

         // Retrieve the validated input data...
         $request->validated();

         $flavour->update($request->all());
         
         return new FlavourResource($flavour);   
    }

    public function destroy(int $id)
    {
        $flavour = Flavour::find($id);
    
        if (!$flavour) {
            return response([
                'message' => 'Flavour could not be found'
            ], 404 ); 
        }
        
        $flavour->beers()->detach();
        
        $flavour::destroy($id);

        return response([
            'message' => 'Flavour deleted'
        ], 200);
    }
}