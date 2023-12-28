<?php

namespace App\Http\Controllers\API\Work;

use App\Http\Controllers\Controller;
use App\Models\MWorkingHour;
use Illuminate\Http\Request;

class WorkingHourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $numPerPage = 10;
    public function index(Request $request) {
        $query  = MWorkingHour::query();

        if ($s = $request->has("s")) {
            
        }
        $datas = $query->paginate($this->numPerPage);

        return $this->hasSuccess('Get list Installers successful.',$datas);
    }
}
