<?php

namespace App\Http\Controllers\Api\Customer;

use App\Http\Controllers\Controller;
use App\Models\MCustomer;
use App\Models\MCustomerOffice;
use Illuminate\Http\Request;

class CustomerOfficeController extends Controller
{
    public $numPerPage = 10;

    public function index(Request $request)
    {
        $query  = MCustomerOffice::query();

        if ($s = $request->has("s")) {
            $query->where("trainee_number", "LIKE", "%" . $s . "%");
            $query->where("entry_date", "LIKE", "%" . $s . "%");
        }

        if ($request->customer_id) {
            $query->where('customer_id', $request->customer_id);
        }

        $query->with(['staffs'])->withCount(['staffs']);

        $datas = $query->paginate($this->numPerPage);

        return $this->hasSuccess('Get list Installers successful.', $datas);
    }
}
