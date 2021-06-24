<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class routes_table extends JsonResource
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
        return[
            'id'=> $this->id,
            'node_one'=>$this->node_one,
            'node_two'=>$this->node_two,
            'route_number'=>$this->route_number,
            'distance'=>$this->distance,
            'time'=>$this->time,
            'create_at'=>$this->created_at,
            'updated_at'=>$this->updated_at,
        ];
    }
}
