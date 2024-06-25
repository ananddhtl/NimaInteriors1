<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'user_id',
        'addresstype',
        'fname',
        'lname',
        'postalcode',
        'street_name',
        'house_no',
        'suffix',
        'bus_no',
        'phone_no',
        'company_name',
        'reference_no',
        'vat_no',
    ];
}
