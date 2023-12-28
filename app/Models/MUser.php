<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MUser extends Model
{
    use HasFactory;

    protected $table = 'm_user';
    protected $guarded = ['user_id'];
    
    public function customer(): BelongsTo
    {
        return $this->belongsTo(MCustomer::class, 'customer_id', 'customer_id');
    }
}
