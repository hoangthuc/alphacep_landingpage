<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\WorkOrder;
use App\Models\Location;
use App\Models\ProductItemInvoice;
use App\Models\LineItemInvoice;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = [
            'type',
            'status', // 0: new, 1: processing, 2:sent, 3: failed, 4: completed
            'public_id',
            'work_order_id',
            'user_id',
            'description',
            'payer_name',
            'payer_phone',
            'payer_email',
            'comments',
            'info_invoice',
            'location_id',
            //'product_items',
            //'line_items',
            'subtotal',
            'convenience_fee_disable',
            'convenience_fee',
            'tax_total',
            'amount',
            'note_void',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function order()
    {
        return $this->belongsTo(WorkOrder::class,'work_order_id');
    }

    public function location()
    {
        return $this->belongsTo(Location::class,'location_id');
    }

    public function product_items()
    {
        return $this->hasMany(ProductItemInvoice::class,'invoice_id');
    }

    public function line_items()
    {
        return $this->hasMany(LineItemInvoice::class,'invoice_id');
    }
}
