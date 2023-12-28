<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

class ProjectWorkTask extends Model
{
    use HasFactory;

    protected $table = 'project_work_task';
    protected $guarded = ['task_id', 'customer_id', 'created_by_id', 'updated_by_id'];
    protected $primaryKey = 'task_id';
    const CREATED_AT = 'created_on';
    const UPDATED_AT = 'updated_on';


    public function project_work(): BelongsTo
    {
        return $this->belongsTo(ProjectWork::class, 'project_work_id', 'project_work_id');
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
            $model->updated_count += 1;
        });  
        static::addGlobalScope('customer', function (Builder $builder) {
            $user = Auth::user();

            if ($user) {
                $builder->where('customer_id', $user->customer_id);
            }
        });
    }
}
