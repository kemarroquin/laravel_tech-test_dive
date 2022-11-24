<?php

namespace App\Http\Resources\API;

use App\Http\Resources\CustomResource;

class UserRelatedResource extends CustomResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'nombre' => $this->firstname,
            'apellido' => $this->lastname,
            'correo_electronico' => $this->email
        ];
    }
}
