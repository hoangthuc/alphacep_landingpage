<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class MCompany extends Model
{
    use HasFactory;

    protected $table = 'm_company';
    protected $guarded = ['company_id'];
    protected $primaryKey = 'company_id';
    const CREATED_AT = 'created_on';
    const UPDATED_AT = 'updated_on';


    public function offices(): HasMany
    {
        return $this->hasMany(MCompany::class, 'company_id', 'company_id');
    }

    public function visit_records(): HasMany
    {
        return $this->hasMany(VisitGuidanceRecord::class, 'company_id', 'company_id');
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
            $model->offices()->delete();
            $model->visit_records()->delete();
        });
        static::addGlobalScope('customer', function (Builder $builder) {
            $user = Auth::user();

            if ($user) {
                $builder->where('customer_id', $user->customer_id);
            }
        });
    }
}
