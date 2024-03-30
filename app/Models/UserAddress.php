<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    use HasFactory;

    // Specify the table associated with the model
    protected $table = 'user_address';

    // Specify the fillable columns
    protected $fillable = [
        'user_id',
        'country_id',
        'state_id',
        'city_id',
        'zip_code',
        'address',
    ];

    // Define relationship with Country model
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    // Define relationship with State model
    public function state()
    {
        return $this->belongsTo(State::class);
    }

    // Define relationship with City model
    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
