<?php

namespace App\Http\Controllers\API\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MCustomer;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $numPerPage = 10;
    public function index(Request $request)
    {
        $query  = MCustomer::query();

        if ($s = $request->has("s")) {
            $query->where("trainee_number", "LIKE", "%" . $s . "%");
            $query->where("entry_date", "LIKE", "%" . $s . "%");
        }

        $query->with(['companies','offices'])->withCount(['companies','offices']);

        $datas = $query->paginate($this->numPerPage);

        return $this->hasSuccess('Get list Installers successful.', $datas);
    }
}
