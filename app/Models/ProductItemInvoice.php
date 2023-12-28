<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductItemInvoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'label',
        'description',
        'name',
        'address',
        'invoice_id',
        'product_id',
        'assigne_id',
        'sort_order',
        'cost',
        'qty',
        'status'
    ];
}
