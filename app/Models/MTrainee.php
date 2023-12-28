<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;

class MTrainee extends Model
{
    use HasFactory;

    protected $table = 'm_trainee';
    protected $guarded = ['trainee_id'];
    protected $primaryKey = 'trainee_id';
    const CREATED_AT = 'created_on';
    const UPDATED_AT = 'updated_on';

    public function project_trainee(): HasOne
    {
        return $this->hasOne(ProjectTrainee::class, 'project_trainee_id', 'project_trainee_id')->onDelete('cascade');
    }

    
    public function trainee_relatives(): HasMany
    {
        return $this->hasMany(MTraineeRelative::class, 'trainee_id', 'trainee_id');
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
