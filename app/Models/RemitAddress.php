<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RemitAddress extends Model
{
    use HasFactory;
    protected $table = 'remit_addresses';
    protected $with = ['country','state'];
    protected $guarded = ['id'];

    public function country()
    {
    	return $this->belongsTo(Country::class, 'country_id');
    }
    public function state()
    {
    	return $this->belongsTo(State::class, 'state_id');
    }
}
