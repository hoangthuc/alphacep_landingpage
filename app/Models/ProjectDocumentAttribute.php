<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

class ProjectDocumentAttribute extends Model
{
    use HasFactory;

    protected $table = 'project_document_attribute';
    protected $guarded = ['project_document_attribute_id'];
    protected $primaryKey = 'project_document_attribute_id';
    const CREATED_AT = 'created_on';
    const UPDATED_AT = 'updated_on';
   
    public function company(): BelongsTo
    {
        return $this->belongsTo(ProjectDocument::class, 'project_document_id', 'project_document_id');
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
