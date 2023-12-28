<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'customer_name',
        'unit_type',
        'vin',
        'year',
        'make',
        'model',
        'unit_number',
        'unit_nickname',
        'fleet',
        'license_plate_state',
        'license_plate'
    ];
}
