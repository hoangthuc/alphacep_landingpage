<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActionOrder extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'work_order_id',
        'sort_order'
    ];
}
