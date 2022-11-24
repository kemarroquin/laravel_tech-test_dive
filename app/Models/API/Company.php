<?php

namespace App\Models\API;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone', 'city',
        'country', 'address', 'status'
    ];

    /**
     * Relationship with User [one-to-many]
     *
     * @return Illuminate\Database\Eloquent\Model\User;
     */
    public function users(){
        return $this->hasMany(User::class);
    }

    /**
     * If is deleting a Company, first delete all users that have realion with the company
     *
     * @return void
     */
    public static function boot() {
        parent::boot();

        static::deleting(function($company){
            $company->users->each(function($user){
                $user->delete();
            });
        });
    }

}
