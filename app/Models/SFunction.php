<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SFunction extends Model
{
    use HasFactory;

    protected $table = 's_function';
    protected $guarded = ['function_id'];
    protected $primaryKey = 'function_id';
    public $timestamps = false;
}
