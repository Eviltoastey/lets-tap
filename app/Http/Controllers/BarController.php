<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBar;
use App\Http\Requests\UpdateBar;
use App\Http\Resources\BarCollection;
use App\Http\Resources\Bar as BarResource;
use App\Models\Bar;

class BarController extends Controller
{
    public function index()
    {
        $bar = Bar::paginate();

        return new BarCollection($bar);
    }

    public function store(StoreBar $request)
    {
         // Retrieve the validated input data...
         $request->validated();

         $bar = new Bar($request->all());
         $bar->save();
         
         return new BarResource($bar);     
    }

    public function show($id)
    {
        $bar = Bar::find($id);

        if (!$bar) {
            return response([
                'message' => 'Bar could not be found'
            ], 404);
        };

        return new BarResource($bar);
    }


    public function update(UpdateBar $request, $id)
    {
        $bar = Bar::find($id);

        if (!$bar) {
            return response([
                'message' => 'Bar could not be found'
            ], 404);
        };

         // Retrieve the validated input data...
         $request->validated();

         $bar->update($request->all());
         
         return new BarResource($bar);   
    }

    public function destroy($id)
    {
        $deleted = Bar::destroy($id);
    
        if (!$deleted) {
            return response([
                'message' => 'Bar could not be found'
            ], 404 ); 
        }

        return response([
            'message' => 'Bar deleted'
        ], 200);
    }
}
