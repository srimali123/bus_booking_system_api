<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class bus_seatesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'id'=> $this->id,
            'bus_id'=>$this->bus_id,
            'seat_number'=>$this->seat_number,
            'price'=>$this->price,



        ];
    }
}
