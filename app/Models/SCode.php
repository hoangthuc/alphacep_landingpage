<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SCode extends Model
{
    use HasFactory;

    protected $table = 's_code';
    protected $guarded = ['code_id'];
    protected $primaryKey = 'code_id';
}
