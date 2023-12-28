<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;

class ProjectWork extends Model
{
    use HasFactory;

    protected $table = 'project_work';
    protected $guarded = ['project_work_id', 'customer_id', 'created_by_id', 'updated_by_id'];
    protected $primaryKey = 'project_work_id';
    const CREATED_AT = 'created_on';
    const UPDATED_AT = 'updated_on';


    public function work(): BelongsTo
    {
        return $this->belongsTo(MTrainee::class, 'work_id', 'work_id');
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class, 'project_id', 'project_id');
    }


    public function task_files(): HasMany
    {
        return $this->hasMany(ProjectWorkTaskFile::class, 'project_work_id', 'project_work_id');
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
        static::deleting(function ($model) {
            $model->task_files()->delete();
        });
        static::addGlobalScope('customer', function (Builder $builder) {
            $user = Auth::user();

            if ($user) {
                $builder->where('customer_id', $user->customer_id);
            }
        });
    }
}
