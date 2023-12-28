<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MFlowgroup extends Model
{
    use HasFactory;

    protected $table = 'm_flowgroup';
    protected $guarded = ['id'];
}
