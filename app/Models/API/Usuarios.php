<?php

namespace App\Models\API;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    use HasFactory;

    /**
     * Relationship for Empresas [one-to-one] 
     *
     * @return Illuminate\Database\Eloquent\Model\Empresas
     */
    public function empresa(){
        return $this->belongsTo(Empresas::class);
    }

}
