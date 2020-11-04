<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStyle;
use App\Http\Requests\UpdateStyle;
use App\Http\Resources\Style as StyleResource;
use App\Http\Resources\StyleCollection;
use App\Models\Style;
use Illuminate\Http\Request;

class StyleController extends Controller
{
    public function index()
    {
        $styles = Style::paginate();

        return new StyleCollection($styles);
    }

    public function store(StoreStyle $request)
    {
         // Retrieve the validated input data...
         $request->validated();

         $style = new Style($request->all());
         $style->save();
         
         return new StyleResource($style);   
    }

    public function show(int $id)
    {
        $style = Style::find($id);

        if (!$style) {
            return response([
                'message' => 'Style could not be found'
            ], 404);
        };

        return new StyleResource($style);
    }


    public function update(UpdateStyle $request, $id)
    {
        $style = Style::find($id);

        if (!$style) {
            return response([
                'message' => 'Style could not be found'
            ], 404);
        };

         // Retrieve the validated input data...
         $request->validated();

         $style->update($request->all());
         
         return new StyleResource($style);   
    }

    public function destroy(int $id)
    {
        $style = Style::find($id);
    
        if (!$style) {
            return response([
                'message' => 'Style could not be found'
            ], 404 ); 
        }
        
        $style->beers()->detach();
        $style->users()->detach();
        
        $style::destroy($id);

        return response([
            'message' => 'Style deleted'
        ], 200);
    }
}