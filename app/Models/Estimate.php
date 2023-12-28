<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estimate extends Model
{
    use HasFactory;
    protected $table = 'estimates';
    protected $guarded = ['id'];
    protected $with = ['bill_address','ship_address'];

    public function bill_address()
    {
    	return $this->hasOne(Address::class,'id', 'bill_address_id');
    }
    public function ship_address()
    {
    	return $this->hasOne(Address::class,'id', 'ship_address_id');
    }
}
