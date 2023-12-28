<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_name',
        'firstname',
        'lastname',
        'phone',
        'cell_phone',
        'email',
        'dot_number',
        'default_labor_rate'
    ];
}
