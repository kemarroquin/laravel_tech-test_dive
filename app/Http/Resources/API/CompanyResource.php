<?php

namespace App\Http\Resources\API;

use App\Http\Resources\CustomResource;

use function PHPSTORM_META\map;

class CompanyResource extends CustomResource
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
            'nombre' => $this->name,
            'correo_electronico' => $this->email,
            'telefono' => $this->phone,
            'ciudad' => $this->city,
            'pais' => $this->country,
            'direccion' => $this->address,
            'estado' => $this->status,
            'users' => $this->whenLoaded('users', function(){
                return $this->users->map(function($user){
                    return [
                        'firstname' => $user->firstname,
                        'lastname' => $user->lastname,
                        'email' => $user->email,
                    ];
                });
            })
        ];
    }
}
