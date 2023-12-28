<?php

namespace App\Http\Controllers\Api\Customer;

use App\Http\Controllers\Controller;
use App\Models\MCustomer;
use App\Models\MCustomerOffice;
use App\Models\MCustomerStaff;
use Illuminate\Http\Request;

class CustomerStaffController extends Controller
{
    public $numPerPage = 10;
    public function index(Request $request)
    {
        $query  = MCustomerStaff::query();

        if ($s = $request->has("s")) {
            $query->where("trainee_number", "LIKE", "%" . $s . "%");
            $query->where("entry_date", "LIKE", "%" . $s . "%");
        }

        if ($request->customer_office_id) {
            $query->where('customer_office_id', $request->customer_office_id);
        }
        
        $datas = $query->paginate($this->numPerPage);

        return $this->hasSuccess('Get list Installers successful.', $datas);
    }
}
