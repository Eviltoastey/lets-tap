<?php

namespace App\Http\Resources;
use App\Http\Resources\User as UserResource;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class Location extends JsonResource
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
            'lat' => $this->lat,
            'lon' => $this->lon,
            'user' => new UserResource(User::find($this->user_id))
        ];
    }
}
