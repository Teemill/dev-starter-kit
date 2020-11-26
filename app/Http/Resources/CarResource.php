<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Manufacturer;
use App\Http\Resources\ManufacturerResource;
use App\FuelType;
use App\Http\Resources\FuelTypeResource;

class CarResource extends JsonResource
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
            "id" => $this->id,
            "manufacturer" => new ManufacturerResource(Manufacturer::findOrFail($this->manufacturer_id)),
            "fuel_type" => new FuelTypeResource(FuelType::findOrFail($this->fuel_type_id)),
            "name" => $this->name,
            "seats" => $this->seats,
            "doors" => $this->doors,
            "top_speed" => $this->top_speed
        ];
    }
}
