<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorRegister extends Model
{
    use HasFactory;
    protected $fillable = [
        'contact_name',
        'contact_email',
        'contact_phone',
        'company_name',
        'company_address',
        'number_of_service_trucks',
        'day_service_call_rate',
        'day_hourly_rate',
        'day_hourly_minimum',
        'day_drive_time_rate',
        'night_service_call_rate',
        'night_hourly_rate',
        'night_hourly_minimum',
        'night_drive_time_rate'
    ];
}
