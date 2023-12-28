<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

class MTraineeRelative extends Model
{
    use HasFactory;

    protected $table = 'm_trainee_relative';
    protected $guarded = ['relative_id'];
    protected $primaryKey = 'relative_id';
    const CREATED_AT = 'created_on';
    const UPDATED_AT = 'updated_on';

      
    public function trainee(): BelongsTo
    {
        return $this->belongsTo(MTrainee::class, 'trainee_id', 'trainee_id');
    }

    
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->customer_id = auth()->user()->customer_id;
            $model->created_by_id = auth()->id();
        });
        static::updating(function ($model) {
            $model->updated_by_id =  auth()->id();
        });  
        static::addGlobalScope('customer', function (Builder $builder) {
            $user = Auth::user();

            if ($user) {
                $builder->where('customer_id', $user->customer_id);
            }
        });
    }
}
