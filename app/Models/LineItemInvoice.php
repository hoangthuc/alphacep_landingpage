<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LineItemInvoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'label',
        'description',
        'address',
        'invoice_id',
        'assigne_id',
        'sort_order',
        'cost',
        'qty',
        'status',
        'employees_id',
        'labor_rate_id',
        'mileage',
        'mileage_rate',
        'invoiced_hours',
        'access'
    ];

    public function assigne()
    {
        return $this->belongsTo(User::class,'assigne_id');
    }
}
