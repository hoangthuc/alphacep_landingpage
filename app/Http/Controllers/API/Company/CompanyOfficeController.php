<?php

namespace App\Http\Controllers\API\Company;

use App\Http\Controllers\Controller;
use App\Models\MCompanyOffice;
use Illuminate\Http\Request;

class CompanyOfficeController extends Controller
{
    public $numPerPage = 10;

    public function index(Request $request)
    {
        $query  = MCompanyOffice::query();

        if ($s = $request->has("s")) {
            $query->where("trainee_number", "LIKE", "%" . $s . "%");
            $query->where("entry_date", "LIKE", "%" . $s . "%");
        }

        if ($request->company_id) {
            $query->where('company_id', $request->company_id);
        }

        $query->with(['staffs']);

        $datas = $query->paginate($this->numPerPage);

        return $this->hasSuccess('Get list Installers successful.', $datas);
    }
}