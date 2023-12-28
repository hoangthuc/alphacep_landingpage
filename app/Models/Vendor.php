<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;
    protected $fillable = [
        'carrier_name',
        'contact_name',
        'contact_email',
        'contact_phone',
        'email',
        "driver_phone",
        "driver_email",
        "signature",
        "url_pdf",
    ];
}
