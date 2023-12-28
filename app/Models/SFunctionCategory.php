<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SFunctionCategory extends Model
{
    use HasFactory;

    protected $table = 's_function_category';
    protected $guarded = ['category_id'];
    protected $primaryKey = 'category_id';
    public $timestamps = false;
}
