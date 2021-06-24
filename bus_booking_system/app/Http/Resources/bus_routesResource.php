<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class bus_routesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       // return parent::toArray($request);
        return[
            'id'=> $this->id,
            'bus_id'=>$this->bus_id,
            'route_id'=>$this->route_id,
            'status'=>$this->status,
            'create_at'=>$this->created_at,
            'updated_at'=>$this->updated_at,
            ];
    }
}
