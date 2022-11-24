<?php

namespace App\Http\Resources\API;

use App\Http\Resources\CustomResource;

class UserResource extends CustomResource
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
            'id' => $this->id,
            'nombre' => $this->firstname,
            'apellido' => $this->lastname,
            'correo_electronico' => $this->email,
            'telefono' => $this->phone,
            'fecha_nacimiento' => $this->convertDateES($this->birthdate),
            'genero' => $this->gender,
            'ciudad' => $this->city,
            'pais' => $this->country,
            'direccion' => $this->address,
            'estado' => $this->status,
            'empresa' => CompanyRelatedResource::make($this->whenLoaded('company'))
        ];
    }
}
