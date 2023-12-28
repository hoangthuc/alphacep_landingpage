<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'customer_name',
        'firstname',
        'lastname',
        'email',
        'phone',
        'cell_phone'
    ];
}
