<?php

namespace App\Http\Controllers\API\TrainingFacility;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MTrainingFacility;


class TrainingFacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $numPerPage = 10;
    public function index(Request $request)
    {
        $query  = MTrainingFacility::query();

        if ($s = $request->has("s")) {
            $query->where("trainee_number", "LIKE", "%" . $s . "%");
            $query->where("entry_date", "LIKE", "%" . $s . "%");
        }

        $datas = $query->paginate($this->numPerPage);

        return $this->hasSuccess('Get list Trainee Relative successful.', $datas);
    }
}
