<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class MCompanystaff extends Model
{
    use HasFactory;


    protected $table = 'm_company_staff';
    protected $guarded = ['company_staff_id'];

    protected $primaryKey = 'company_staff_id';
    const CREATED_AT = 'created_on';
    const UPDATED_AT = 'updated_on';

    public function office(): BelongsTo
    {
        return $this->belongsTo(MCompanyOffice::class, 'company_office_id', 'company_office_id');
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
