<?php

namespace App\Models\API;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresas extends Model
{
    use HasFactory;

    /**
     * Relationship for Usuarios [one-to-many] 
     *
     * @return Illuminate\Database\Eloquent\Model\Usuarios
     */
    public function usuarios(){
        return $this->hasMany(Usuarios::class);
    }

}
