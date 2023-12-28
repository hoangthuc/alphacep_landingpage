<?php

namespace App\Http\Controllers\API\AuditReport;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AuditReport;


class AuditReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $numPerPage = 10;
    public function index(Request $request)
    {
        $query  = AuditReport::query();

        if ($s = $request->has("s")) {
            $query->where("trainee_number", "LIKE", "%" . $s . "%");
            $query->where("entry_date", "LIKE", "%" . $s . "%");
        }

        $datas = $query->paginate($this->numPerPage);

        return $this->hasSuccess('Get list Audit Report successful.', $datas);
    }
}
