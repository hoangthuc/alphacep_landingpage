<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\WorkOrderTemplate;
use App\Models\Invoice;
use App\Models\User;
use App\Models\Location;
use App\Models\ActionOrder;

class WorkOrder extends Model
{
    use HasFactory;
    protected $fillable = [
        'carrier_name',
        'work_order_reference',
        'work_order_template_id',
        'invoice_id',
        'user_id',
        'email',
        "driver_name",
        "driver_phone",
        "driver_email",
        "dispatch_phone_number",
        "last_8_of_vin",
        "year",
        "make",
        "model",
        "unit_number",
        "issue_with_unit",
        "location_id",
        "additional_notes",
        "signed_contact_name",
        "signed_contact_phone",
        "signed_contact_email",
        "signed_custom_fields",
        "date_start_job",
        "status_complete",
        "signature",
        "company_name",
        "public_id",
    ];

    public function template()
    {
        return $this->belongsTo(WorkOrderTemplate::class,'work_order_template_id');
    }

    public function invoice()
    {
        return $this->belongsTo(Invoice::class,'invoice_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function location()
    {
        return $this->belongsTo(Location::class,'location_id');
    }

    public function actions()
    {
        return $this->hasMany(ActionOrder::class,'work_order_id');
    }
}
