<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class super_adminResource extends JsonResource
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
            'name'=>$this->name,
            'email'=>$this->email,
            'password'=>$this->password,
            'create_at'=>$this->created_at,
            'updated_at'=>$this->updated_at,

        ];
    }
}
