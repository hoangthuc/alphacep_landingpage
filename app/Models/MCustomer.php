<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class MCustomer extends Model
{
    use HasFactory;

    protected $table = 'm_customer';
    protected $guarded = ['customer_id'];
    protected $primaryKey = 'customer_id';
    const CREATED_AT = 'created_on';
    const UPDATED_AT = 'updated_on';

    public function user(): HasOne
    {
        return $this->hasOne(MUser::class, 'customer_id', 'customer_id');
    }

    public function offices(): HasMany
    {
        return $this->hasMany(MCustomerOffice::class, 'customer_id', 'customer_id');
    }

    public function companies(): HasMany
    {
        return $this->hasMany(MCompany::class, 'customer_id', 'customer_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_by_id = auth()->id();
        });
        static::updating(function ($model) {
            $model->updated_by_id =  auth()->id();
        });
    }
}
