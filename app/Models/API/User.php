<?php

namespace App\Models\API;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'email', 'phone', 'birthdate',
        'gender', 'city', 'country', 'address', 'status',
        'company_id'
    ];

    /**
     * Relationship with Company [one-to-one]
     *
     * @return Illuminate\Database\Eloquent\Model\Company;
     */
    public function company(){
        return $this->belongsTo(Company::class);
    }

}
