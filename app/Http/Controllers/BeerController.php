<?php

namespace App\Http\Controllers;

use App\Http\Resources\Beer as BeerResource;
use App\Http\Resources\BeerCollection;
use App\Models\Brewery;
use App\Models\Beer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BeerController extends Controller
{

    public function index()
    {
        // get all user records
       $beers = Beer::paginate();

       // pass all eloquent objects to user collection
       return new BeerCollection($beers);
    }

    public function store(Request $request)
    {
        $this->validator($request);

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

    public function update(Request $request, $id)
    {
        $this->validator($request);

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

    public function validator(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'average_rating' => 'required|numeric',
            'brewery_id' => 'required|numeric',
            'flavours' => 'required|array',
            'styles' => 'required|array'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toArray(), 422);
        }
    }
}
