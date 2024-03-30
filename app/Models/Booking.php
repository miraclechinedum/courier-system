<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'pickup_location',
        'delivery_location',
        'package_details',
        'status',
        'tracking_id',
        'service_mode',
        'courier_company',
        'packaging_type',
        'payment_method',
        'package_description',
        'quantity',
        'weight',
        'length',
        'width',
        'height',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define the relationship with sender_customer_address
    public function senderCustomerAddress()
    {
        return $this->belongsTo(UserAddress::class, 'sender_customer_address');
    }

    // Define the relationship with recipient_client_address
    public function recipientClientAddress()
    {
        return $this->belongsTo(UserAddress::class, 'recipient_client_address');
    }

    // Define relationship with User model for sender
    public function sender()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Define relationship with UserAddress model for sender's address
    public function senderAddress()
    {
        return $this->belongsTo(UserAddress::class, 'sender_customer_address');
    }

    // Define relationship with User model for recipient
    public function recipient()
    {
        return $this->belongsTo(User::class, 'recipient_client');
    }

    // Define relationship with UserAddress model for recipient's address
    public function recipientAddress()
    {
        return $this->belongsTo(UserAddress::class, 'recipient_client_address');
    }
}
