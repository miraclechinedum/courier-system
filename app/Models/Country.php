<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries';

    protected $fillable = ['country_name', 'phone_code', 'currency', 'currency_symbol'];
}
