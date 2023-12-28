<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MiscCharge extends Model
{
    use HasFactory;
    protected $table = 'misc_charges';
    protected $guarded = ['id'];
}
