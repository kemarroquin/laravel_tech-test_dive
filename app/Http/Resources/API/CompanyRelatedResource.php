<?php

namespace App\Http\Resources\API;

use App\Http\Resources\CustomResource;

class CompanyRelatedResource extends CustomResource
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
            'nombre' => $this->name,
            'email' => $this->email
        ];
    }
}
