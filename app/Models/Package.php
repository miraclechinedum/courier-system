<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'booking_id', 'package_description', 'quantity', 'weight', 'length', 'width', 'height',
    ];

    /**
     * Get the booking associated with the package.
     */
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
