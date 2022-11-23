<?php

namespace App\Models\API;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    /**
     * Relationship with Company [one-to-one]
     *
     * @return Illuminate\Database\Eloquent\Model\Company;
     */
    public function company(){
        return $this->belongsTo(Company::class);
    }

}
