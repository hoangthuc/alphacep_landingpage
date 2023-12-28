<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class MWorkingHour extends Model
{
    use HasFactory;

    protected $table = 'm_working_hour';
    protected $guarded = ['working_hour_id'];
    protected $primaryKey = 'working_hour_id';
    const CREATED_AT = 'created_on';
    const UPDATED_AT = 'updated_on';

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_by_id = auth()->id();
        });
        static::updating(function ($model) {
            $model->updated_by_id =  auth()->id();
            $model->updated_count += 1;
        });  
     
    }
}
