<?php

namespace App\Models\API;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    /**
     * Relationship with User [one-to-many]
     *
     * @return Illuminate\Database\Eloquent\Model\User;
     */
    public function users(){
        return $this->hasMany(User::class);
    }

}
