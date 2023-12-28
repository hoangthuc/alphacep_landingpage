<?php

namespace App\Http\Controllers\API\Company;

use App\Http\Controllers\Controller;
use App\Models\MCompany;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $numPerPage = 10;
    public function index(Request $request) {
        $query  = MCompany::query();

        if ($s = $request->has("s")) {
            $query->where("trainee_number", "LIKE", "%" . $s . "%");
            $query->where("entry_date", "LIKE", "%" . $s . "%");
        }
        
        $query->with(['offices'])->withCount(['offices']); 

        $datas = $query->paginate($this->numPerPage);

        return $this->hasSuccess('Get list Installers successful.',$datas);
    }
}
