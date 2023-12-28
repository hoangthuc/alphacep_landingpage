<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProjectWorkTaskFile extends Model
{
    use HasFactory;

    protected $table = 'project_work_task_file';
    protected $guarded = ['task_file_id', 'customer_id', 'created_by_id', 'updated_by_id'];
    protected $primaryKey = 'task_file_id';
    const CREATED_AT = 'created_on';
    const UPDATED_AT = 'updated_on';
    protected $appends = ['file_path'];


    public function project_work(): BelongsTo
    {
        return $this->belongsTo(ProjectWork::class, 'project_work_id', 'project_work_id');
    }

    public function getFilePathAttribute()
    {
        return Storage::url($this->getStoragePath());
    }

    // Helper method to get the storage path
    protected function getStoragePath()
    {
        return "public/uploads/{$this->file_name}";
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
            Storage::delete($model->getStoragePath());
        });
        static::addGlobalScope('customer', function (Builder $builder) {
            $user = Auth::user();

            if ($user) {
                $builder->where('customer_id', $user->customer_id);
            }
        });
    }
}
