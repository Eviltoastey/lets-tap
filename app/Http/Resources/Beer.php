<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Brewery as BreweryResource;
use App\Http\Resources\FlavourCollection;
use App\Http\Resources\StyleCollection;
use App\Models\Brewery;

class Beer extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'average_rating' => $this->average_rating,
            'brewery' => new BreweryResource(Brewery::find($this->brewery_id)),
            'flavours' => new FlavourCollection($this->flavours),
            'styles' => new StyleCollection($this->styles)
        ];
    }
}
