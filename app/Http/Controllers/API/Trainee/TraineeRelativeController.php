<?php

namespace App\Http\Controllers\API\Trainee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MTraineeRelative;


class TraineeRelativeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $numPerPage = 10;
    public function index(Request $request)
    {
        $query  = MTraineeRelative::query();

        if ($s = $request->has("s")) {
            $query->where("TraineeRelative_number", "LIKE", "%" . $s . "%");
            $query->where("entry_date", "LIKE", "%" . $s . "%");
        }

        if ($request->trainee_id) {
            $query->where('trainee_id', $request->trainee_id);
        }

        $datas = $query->with('trainee')->paginate($this->numPerPage);

        return $this->hasSuccess('Get list Trainee Relative  successful.', $datas);
    }
}
