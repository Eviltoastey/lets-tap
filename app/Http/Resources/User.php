<?php

namespace App\Http\Resources;

use App\Models\Beer;
use App\Models\Bar;
use App\Models\Brewery;
use App\Models\Store;

use App\Http\Resources\Beer as BeerResource;
use App\Http\Resources\Bar as BarResource;
use App\Http\Resources\Brewery as BreweryResource;
use App\Http\Resources\Store as StoreResource;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
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
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
            "name" => $this->name,
            "email" => $this->email,
            "age" => $this->age,
            "description" => $this->description,
            "phone" => $this->phone,
            "beer_id" => new BeerResource(Beer::find($this->beer_id)),
            "bar_id" => new BarResource(Bar::find($this->bar_id)),
            "brewery_id" => new BreweryResource(Brewery::find($this->brewery_id)),
            "store_id" => new StoreResource(Store::find($this->store_id))
        ];
    }
}
